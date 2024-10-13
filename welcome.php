<?php
class Tarefa {
    public $id;
    public $descricao;
    public $concluida = false;

    public function marcarComoConcluida(){
        $this->concluida = true;
    }

    public function criarId($id){
        $this->id = $id;
    }

    public function __construct($descricao){
        $this->descricao = $descricao;
    }

    public function __toString(){
        if($this-> concluida){
            return "Tarefa: $this->descricao - Concluída: Sim";
        } else {
            return "Tarefa:     $this->descricao - Concluída: Não";
        }
        
    }

}

class GerenciadorTarefas {
    public $tarefas = [];

    public function adicionarTarefas(Tarefa $tarefa){
        array_push($this->tarefas, $tarefa);
    }

    public function listarTarefas() {
        foreach ($this->tarefas as $tarefa){
            echo $tarefa;
            echo "<br>";
        }
    }

    public function concluirTarefa($id){
        foreach($this->tarefas as $tarefa){
            if($tarefa->id == $id){
                $tarefa->concluida = true;
            }
        }
    }
}
$GerenciadorTarefas = new GerenciadorTarefas();
$Tarefa1 = new Tarefa("Primeira tarefa");
$Tarefa1->criarId(1);
$Tarefa1->marcarComoConcluida();

$Tarefa2 = new Tarefa("Segunda tarefa");
$Tarefa2->criarId(2);

$GerenciadorTarefas->adicionarTarefas($Tarefa1);
$GerenciadorTarefas->adicionarTarefas($Tarefa2);
$GerenciadorTarefas->concluirTarefa(2);
$GerenciadorTarefas->listarTarefas();



?>