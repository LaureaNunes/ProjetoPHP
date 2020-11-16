
 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro Cliente</title>
    </head>
    <body>
        <form action="?act=save" method="POST" name="form1" >
          <h1>Dados do Cliente</h1>
          <hr>
          <input type="hidden" name="id" />
		  <?php
		  
		  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ? $_POST["nome"] : "";
	$telefone = (isset($_POST["telefone"]) && $_POST["telefone"] != null) ? $_POST["telefone"] : "";
	$data_nascimento = (isset($_POST["data_nascimento"]) && $_POST["data_nascimento"] != null) ? $_POST["data_nascimento"] : "";
	$endereco = (isset($_POST["endereco"]) && $_POST["endereco"] != null) ? $_POST["endereco"] : "";
	$bairro = (isset($_POST["bairro"]) && $_POST["bairro"] != null) ? $_POST["bairro"] : "";
	$cep = (isset($_POST["cep"]) && $_POST["cep"] != null) ? $_POST["cep"] : "";
	$ponto_referencia = (isset($_POST["ponto_referencia"]) && $_POST["ponto_referencia"] != null) ? $_POST["ponto_referencia"] : "";
    $email = (isset($_POST["email"]) && $_POST["email"] != null) ? $_POST["email"] : "";
   } else if (!isset($id)) {
    
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $nome = NULL;
	$telefone = NULL;
	$data_nascimento = NULL;
	$endereco = NULL;
	$bairro = NULL;
	$cep = NULL;
	$ponto_referencia = NULL;
    $email = NULL;
    }
		  		  
		  
	if (isset($id) && $id != null || $id != "")
   		   {
                echo "value=\"{$id}\"";
            }
			
			
			if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $nome != "") {
    try {
        $stmt = $conexao->prepare("INSERT INTO Dados_Cliente (nome, telefone, data_nascimento, endereco, bairro, cep, ponto_referencia, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $nome);
		$stmt->bindParam(1, $telefone);
		$stmt->bindParam(1, $data_nascimento);
		$stmt->bindParam(1, $endereco);
		$stmt->bindParam(1, $bairro);
		$stmt->bindParam(1, $cep);
		$stmt->bindParam(1, $ponto_referencia);
        $stmt->bindParam(2, $email);
                 
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo "Dados cadastrados com sucesso!";
                $id = null;
                $nome = null;
				$telefone = NULL;
				$data_nascimento = NULL;
				$endereco = NULL;
				$bairro = NULL;
				$cep = NULL;
				$ponto_referencia = NULL;
                $email = null;

            } else {
                echo "Erro ao salvar os dados";
            }
        } else
		{
               throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro)
	{
        echo "Erro: " . $erro->getMessage();
    }
	
}
			
			
		  ?>/> 
		  Nome: 
		  <input type="text" name="nome" ><br />
		  <?php
		  if (isset($nome) && $nome != null || $nome != "")
		  {
                echo "value=\"{$nome}\""; 
          }
		  ?>/>
		  Telefone:
		  <input type="string" name="telefone" ><br/>
		  <?php
		  if (isset($telefone) && $telefone != null || $telefone != "")
		  {
                echo "value=\"{$telefone}\""; 
          }
		  ?>/>
		  Data_Nascimento:
		  <input type="date" name="data_nascimento" ><br/>
		  <?php
		  if (isset($data_nascimento) && $data_nascimento != null || $data_nascimento != "")
		  {
                echo "value=\"{$data_nascimento}\""; 
          }
		  ?> />
		  Endereco: 
		  <input type="text" name="endereco" ><br/>
		  <?php
		  if (isset($endereco) && $endereco != null || $endereco != "")
		  {
                echo "value=\"{$endereco}\""; 
          }
		  ?> />
	      Bairro: 
		  <input type="text" name="bairro" ><br/>
		  <?php
		  if (isset($bairro) && $bairro != null || $bairro != "")
		  {
                echo "value=\"{$bairro}\""; 
          }
		  ?> />
	      Cep: 
		  <input type="char_get_numeric_value" name="cep" ><br/>
		  <?php
		  if (isset($cep) && $cep != null || $cep != "")
		  {
                echo "value=\"{$cep}\""; 
          }
		  ?> />
	      Ponto_Referencia: 
	      <input type="text" name="ponto_referencia" ><br/>
		  <?php
		  if (isset($ponto_referencia) && $ponto_referencia != null || $ponto_referencia != "")
		  {
                echo "value=\"{$ponto_referencia}\""; 
          }
		  ?> />
		  E-mail:
          <input type="text" name="email" ><br/>
		  <?php
		   if (isset($email) && $email != null || $email != "")
		  {
                echo "value=\"{$email}\""; 
          }
		  ?> />
         <input type="submit" value="salvar" />
         <input type="reset" value="Novo" />
         <hr>
       </form>
    </body>
</html> 
