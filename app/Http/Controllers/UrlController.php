<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UrlController extends Controller
{
    // Función para acortar una URL
    
    public function acortarUrl(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'url_larga' => 'required|url',
            'codigo_personalizado' => 'nullable|alpha_dash|max:50',
        ]);

        $url_larga = $request->input('url_larga');
        $codigo_personalizado = $request->input('codigo_personalizado');

        // Si se proporciona un código personalizado, validarlo
        if ($codigo_personalizado) {
            if (!$this->esCodigoPersonalizadoValido($codigo_personalizado)) {
                return response()->json(['error' => 'El código personalizado no es válido.'], 400);
            }
            if ($this->codigoExiste($codigo_personalizado)) {
                return response()->json(['error' => 'El código personalizado ya está en uso.'], 400);
            }
            $codigo_corto = $codigo_personalizado;
        } else {
            // Generar un código corto único
            $codigo_corto = $this->generarCodigoUnico();
        }

        // Guardar la URL en la base de datos
        $url = Url::create([
            'original_url' => $url_larga,
            'short_code' => $codigo_corto,
        ]);

        return response()->json([
            'url_corta' => url("/$codigo_corto"),
        ]);
    }

    public function redirigir($codigo)
    {
        $url = Url::where('short_code', $codigo)->firstOrFail();
        return redirect($url->original_url);
    }

    // Función para generar un código corto único
    protected function generarCodigoUnico($longitud = 6)
    {
        do {
            $codigo = Str::random($longitud);
        } while ($this->codigoExiste($codigo));
        return $codigo;
    }

    // Función para verificar si un código ya existe
    protected function codigoExiste($codigo)
    {
        return Url::where('short_code', $codigo)->exists();
    }

    // Función para validar un código personalizado
    protected function esCodigoPersonalizadoValido($codigo)
    {
        // Solo permite letras, números y guiones
        return preg_match('/^[a-zA-Z0-9-]+$/', $codigo);
    }
}