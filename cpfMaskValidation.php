<?php
// Função para inserir mascara em CPF, com opção para validação.
// Recebe string com CPF ex. '09809809809' e retorna o CPF com mascara '098.098.098-09'
// > cpf('08791351669') | o CPF deve ser enviado como string.
/**
 * @param $cpf
 * @param bool $validacao
 * @return bool|string
 */
function cpf($cpf, $validacao = false){

        $cpf = preg_replace("/[^0-9]/", "", $cpf,1,$count);

        if($count > 0){
            return 'Erro: Digite somente caracteres numéricos!';
        }

        if(strlen($cpf) !== 11 ):
            return 'Erro: CPF contém '.strlen($cpf).' digito(s)!';
        endif;


        // Caso receba true na $validacao faz um teste de validação do CPF informado,
        // caso seja um CPF valido, é retornado 1(true)

        if($validacao !== false){

            // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
            if (preg_match('/(\d)\1{10}/', $cpf)) {
                return false;
            }
            // Faz o calculo para validar o CPF
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }

            return true;

        }


        for ($i = 0; $i <= 3; $i++):
            
            $j = 3;
            if($i == 3):
                $j = 2;
            endif;
        
            if($i == 0):
                $k = $i;
                $cpfmask = substr($cpf, $k, $j);
            else:
                $k = $k + 3;
                if($k != 9):
                    $cpfmask .= '.'. substr($cpf, $k, $j);
                else:
                    $cpfmask .= '-'. substr($cpf, $k, $j);
                endif;
        
            endif;
            
        endfor;
    
        return $cpfmask;
    }
