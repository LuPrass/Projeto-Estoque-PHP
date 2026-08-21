<?php
require_once __DIR__ . '/../class/TipoMovimentacao.php';

class TipoMovimentacaoController {
    private $tipoMovimentacao;

    public function __construct($pdo) {
        $this->tipoMovimentacao = new TipoMovimentacao($pdo);
    }

    public function index() {
        return $this->tipoMovimentacao->read();
    }

    public function create($descricao) {
        $this->tipoMovimentacao->create($descricao);
    }

    public function update($id_tipo, $descricao) {
        $this->tipoMovimentacao->update($id_tipo, $descricao);
    }

    public function delete($id_tipo) {
        $this->tipoMovimentacao->delete($id_tipo);
    }
}
?>