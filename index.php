<?php

    function borrar(){
        if(PHP_OS==="WINNT"){
            system("cls");
        }else{
            system("clear");
        }
    }

    $palabras=["foco","foca","marinero","asistente","celular","teclado","desodorante","vaso","plato","crema","papel","silla","almohada","lentes","ventilador","sabana","cama","pantalon","televisor","armario","comoda","puerta","freidora"];
    define("INTENTOS",5);
    echo "Bienvenido al juego **NO TE SUICIDES** \n";

    $opcion=$palabras[rand(0,count($palabras))];

    //var_dump(count($palabras));

    $opcion=strtolower($opcion);

    $tamanio=strlen($opcion);

    $adivinado=str_pad("",$tamanio,"_");

    $intento=0;


    echo "LA PALABRA TIENE ".$tamanio." LETRAS \n";
    
    echo $adivinado."\n";

    do{

        $palabra=strtolower(readline("ESCRIBE UNA LETRA : "));

        if(str_contains($opcion,$palabra)){
            borrar();
            $offset=0;
            while(($poscion_letra=strpos($opcion,$palabra,$offset))!==false){
                $adivinado[$poscion_letra]=$palabra;
                $offset=$poscion_letra+1;
            }
            echo "QUE CRACK, HAS DESCUBIERTO UNA NUEVA LETRA!\n";

            echo "Hasta ahora llevas descubriento esto : $adivinado \n";
            
        }else{
            borrar();
            $intento++;
            echo "NO HAS ATINADO NINGUNA LETRA :c \n";
            if($intento<INTENTOS){
                echo "AUN TE QUEDAN ".(INTENTOS-$intento)." INTENTOS.\n";
            }else{
                echo "HAS AGOTADO TUS INTENTOS.\n";
            }
            
            
        }
        
    }while($intento<INTENTOS && $adivinado!=$opcion);
    borrar();
    if($adivinado==$opcion){
        borrar();
        echo "FELICIDADES HAS DESCUBIERTO LA PALABRA \n";
        echo "\n la palabra a descubrir era : $opcion";
        echo "\n tu lograste decifrar esto : $adivinado";
    }else{
        borrar();
        echo "MALA SUERTE CRACK, INTENTALO DE NUEVO! \n";
        echo "\n la palabra a descubrir era : $opcion";
        echo "\n tu lograste decifrar esto : $adivinado";
    }

?>