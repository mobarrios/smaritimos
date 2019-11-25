<?php

namespace App\Http\Helpers;

class ApiFEHelper
{
    protected $apiKey;
    protected $curl;
    protected $header;
    protected $httpResultado;
    protected $httpCode;
    protected $urlBase;

    public function __construct()
    {
        $this->urlBase = env('APIFE_URL');

        $this->header = [

            'token:certificado',
            'passCert:cantghost',
            'Content-Type: application/json',
            //'name:a',
            //'X-DreamFactory-Api-Key: ' . $apiKey,
        ];
    }

    public function call( $method = 'GET', Array $body = [])
    {
        # Abro conexión
        $this->_init($this->urlBase);

        # Método
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $method);

        # Si tiene parámetros en el body
        if (count($body) > 0)
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($body));

        # Ejecuto
        $this->httpResultado = $this->_exec();
        $this->httpCode = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);

        # Cierro
        $this->_close();
    }

    public function getHttpCode()
    {
        return $this->httpCode;
    }

    public function getResultado()
    {
        return json_decode($this->httpResultado);
    }

    protected function _close()
    {
        curl_close($this->curl);
    }

    protected function _exec()
    {
        return curl_exec($this->curl);
    }

    protected function _init($url)
    {
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->header);
        //esto es para windows
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        //
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
    }


}

