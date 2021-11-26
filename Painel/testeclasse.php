<?php 
class user{
   public $nome;
   public $senha;
   public $nivelAcesso;
   function user($n,$s,$na){
         $this->nome = $n;
         $this->senha = $s;
         $this->nivelAcesso = $na;
   }
}
class cronograma{
	public $Data;
	public $Pdf;
	function cronograma($d,$p){
        $this->Data = $d;
        $this->Pdf = $p;
	}
}
class sala{
   public $Numero;
   public $Disponibilidade;
   function sala($n,$d){
         $this->Numero = $n;
         $this->Disponibilidade = $d;
   }
}
class turma{
	public $Numero;
	public $Codigo;
	function turma($n,$c){
       $this->Numero = $n;
       $this->Codigo = $c;
	}
}
class pedido{
	public $ID_Pedido;
	public $Texto;
	public $Status;
	public $Autor;
	public $Sala;
	function pedido($id,$t,$s,$a,$sl){
	   $this->ID_Pedido = $id;
       $this->Texto = $t;
       $this->Status = $s;
       $this->Autor = $a;
       $this->Sala = $sl;
	}
}
class postagemNormal{
	public $Titulo;
	public $Descricao;
	public $Imagem;
	public $Data;
	public $Postador;
	function postagemNormal($t,$d,$i,$dt,$p){
		$this->Titulo = $t;
		$this->Descricao = $d;
		$this->Imagem = $i;
		$this->Data = $dt;
		$this->Postador = $p;
 
	}

}
class postagemTurma{
	public $Tipo;
	public $Texto;
	public $Arquivo;
	public $Data;
	public $Postador;
	public $Disciplina;
	public $Turma;
	function postagemTurma($ti,$te,$a,$dt,$p,$d,$tu){
		$this->Tipo = $ti;
		$this->Texto = $te;
		$this->Arquivo = $a;
		$this->Data = $dt;
		$this->Postador = $p;
		$this->Disciplina = $d;
		$this->Turma = $tu;
	}
}
class mensagem{
    public $Autor;
    public $Texto;
    public $Destinatario;
    function mensagem($a,$t,$d){
       $this->Autor = $a;
       $this->Texto = $t;
       $this->Destinatario = $d;
    }
}



?>