<?php

class Orcamento {

    private $itens;

    public function adiciona(OrcavelInterface $produto, $qtde) {
        $this->itens[] = array($produto, $qtde );
    }

    public function calculaTotal() {
        $total = 0;
        
        foreach ($this->itens as $item) {
            $total += ($item[0]->getPreco() * $item[1]);
        }
        echo '<pre>';
        print_r($this->itens);
        echo '</pre>';
        return $total;
    }

}


