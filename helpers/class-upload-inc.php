<?php
    /**
     * Aqui vamos tratar os arquivos para o upload
     */

     class Upload_arquivos {
        public $campo;
        public $arquivos;
        public $pastaDestino;
        public $subistituir;
        public $fazerUpload;
        public $erroCarregamento;

        //somente vamos aceitar extensões dos tipos anexados no array
        public $extensoesValidas = array('jpeg', 'jpg', 'jpeg', 'gif', 'png');
        
        /**
        *  
        * @param string $campo
        * @param string $pastaDestino
        * @param string $subistituir
        * @param array $extensoesValidas
        */

        public function uploadArquivoa($campo, $pastaDestino, $subistituir, $subistituir, $extensoesValidas="") {
            $this->campo = $campo;
            $this->pastaDestino = $pastaDestino;
            $this->subistituir = $subistituir;
            $this->fazerUpload = false;

            if (is_array($extensoesValidas) && count($extensoesValidas) > 0) {
                $this->extensoesValidas = $extensoesValidas;
            }

            if (isset($_FILES[$campo])) 
            {
                if($_FILES[$campo]['error'] == UPLOAD_ERR_OK) 
                {
                    $this->arquivos = $_FILES[$campo]['name'];
                    if ($this->arquivoPermitido($this->arquivos)) 
                    {
                        $arquivoDestino = $pastaDestino . '/' . $this->arquivos;
                        if (!$subistituir) 
                        {
                            if(is_file($arquivoDestino)) 
                            {
                                $this->arquivos = uniqid() .'_'. $this->arquivos;
                                $arquivoDestino = $pastaDestino .'/'. $this->arquivos;
                            }
                        }

                        move_uploaded_file($_FILES[$campo]['tmp_NAME'], $arquivoDestino);
                    }
                    else {
                        $this->erroCarregamento = $_FILES[$campo]['error'];
                    }                    
                }
            }            
        }

        function arquivoPermitido($arquivos)
        {
            $partes = explode(',', $arquivos);

            $extensao = end($partes);

            if (array_search($extensao, $this->extensoesValidas)) 
            {
                return true;
            }

            return false;
        }



    }
?>