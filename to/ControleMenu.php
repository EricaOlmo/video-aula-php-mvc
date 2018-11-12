<?php

/**
 * Description of ControleMenu
 *
 * @author Erica
 */
class ControleMenu implements IPrivateTO {
  
    //para mostrar a tela de menu
    public function inicio(){
        $v = new TGui("inicio"); //criando view - nome inicio
        $v->renderizar(); 
    }
}
