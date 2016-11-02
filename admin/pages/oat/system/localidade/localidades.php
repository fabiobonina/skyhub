				<?php

					$localidade = new Localidades();
						#CADASTRAR
						if(isset($_POST['cadastrar'])):
              $cliente = $_POST['cliente'];
              $regional = $_POST['regional'];
              $nome = $_POST['nome'];
              $municipio = $_POST['municipio'];
              $uf = $_POST['uf'];
							$lat = $_POST['lat'];
							$long =$_POST["long"];
							$ativo = $_POST["ativo"];

							$localidade->setCliente($cliente);
							$localidade->setRegional($regional);
              $localidade->setNome($nome);
							$localidade->setMunicipio($municipio);
							$localidade->setUf($uf);
              $localidade->setLat($lat);
							$localidade->setLong($long);
							$localidade->setAtivo($ativo);
							# Insert
							if($localidade->insert()){
								echo '<div class="alert alert-success">
					          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Inserido com sucesso!</strong> Redirecionando ...
                    </div>';
                header("Refresh: 1, oat-system.php?acao=localidades");	
							}
						endif;
						#ATUALIZAR
						if(isset($_POST['atualizar'])):

							$id = $_POST['id'];
              $cliente = $_POST['cliente'];
              $regional = $_POST['regional'];
              $nome = $_POST['nome'];
              $municipio = $_POST['municipio'];
              $uf = $_POST['uf'];
							$lat = $_POST['lat'];
							$long =$_POST["long"];
							$ativo =$_POST["ativo"];

							$localidade->setCliente($cliente);
							$localidade->setRegional($regional);
              $localidade->setNome($nome);
							$localidade->setMunicipio($municipio);
							$localidade->setUf($uf);
              $localidade->setLat($lat);
							$localidade->setLong($long);
							$localidade->setAtivo($ativo);

							if($localidade->update($id)){
								echo '<div class="alert alert-success">
					          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Atualizado com sucesso!</strong> Redirecionando ...
                    </div>';
                header("Refresh: 1, oat-system.php?acao=localidades");	
							}
						endif;
						#DELETAR
						if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
							$id = (int)$_GET['id'];
							if($localidade->delete($id)){
								echo '<div class="alert alert-success">
					          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Deletado com sucesso!</strong> Redirecionando ...
                    </div>';
                header("Refresh: 1, oat-system.php?acao=localidades");	
							}
						endif;

            $cliente = new Clientes();
				?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Clientes <small>Lista de dados</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
              <?php
                if(isset($_GET['acao1'])){
                  $acao = $_GET['acao1'];	
                  
                if($acao=='add'){include("admin/pages/oat/system/localidade/add.php");}	
                  // cadastro
                if($acao=='edt'){include("admin/pages/oat/system/localidade/edt.php");}

                }
              ?>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista<small>Clientes</small>
                    <form data-parsley-validate method="get" action="">
                      <a type="submit" href="oat-system.php?acao=localidade&acao1=add?>" ><i class='fa  fa-plus'></i>Adicionar</a>
		                </form></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Dados da tabela.
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Cliente</th>
                          <th>Regional</th>
                          <th>Name</th>
                          <th>Municipio</th>
                          <th>UF</th>
                          <th>Latitude</th>
                          <th>Longitude</th>
                          <th>Ativo</th>
                          <th>Ação</th>
                        </tr>
                      </thead>
                			<?php foreach($localidade->findAll() as $key => $value): ?>
                      <tbody>
                        <tr>
                          <td><?php echo $value->id; ?></td>
                          <td><?php echo $value->cliente; ?></td>
                          <td><?php echo $value->regional; ?></td>
                          <td><?php echo $value->nome; ?></td>
                          <td><?php echo $value->municipio; ?></td>
                          <td><?php echo $value->uf; ?></td>
                          <td><?php echo $value->latitude; ?></td>
                          <td><?php echo $value->longitude; ?></td>
                          <td><?php echo $value->ativo; ?></td>
                          <td>
                            <?php echo "<a href='oat-system.php?acao=localidades&acao1=edt&id=" . $value->id . "'><i class='fa  fa-edit'></i>Editar </a>"; ?>
                            <?php echo "<a href='oat-system.php?acao=locealidades&acao1=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'><i class='fa  fa-trash-o'></i>Deletar</a>"; ?>
                          </td>
                        </tr>
                      </tbody>
                      <?php endforeach; ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->