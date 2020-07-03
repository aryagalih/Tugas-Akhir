<?php 
  require_once('partials/header.php');
  require_once('config.php');
 ?>

 <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid"><br>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h2><i class="zmdi zmdi-book"></i> MATA PELAJARAN</h2>
                        </div>
                        <div class="col-md-8">
                            <form class="search-bar">
                             <input type="text" class="form-control" id="search-field" placeholder="Search" title="Type in a name">
                             <a href="javascript:void();" class="search"><i class="icon-magnifier"></i></a>
                          </form>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <?php 
                        switch ((isset($_GET['system_message']) ? $_GET['system_message'] : '')) {
                            case 'sukses':
                                echo "<div class='alert alert-primary' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                    <strong>Berhasil !</strong> Mata Pelajaran Berhasil Diperbarui !!
                                </div>";
                                break;
                            case 'gagal':
                                echo "<div class='alert alert-danger' role='alert'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                    <strong>Gagal !</strong> ".$_GET['reason']."
                                </div>";
                                break;
                            default :
                                echo "<div></div>";
                            break;
                        }
                    ?>
                </div>
            </div>
            <div class="row">
				<div class="col">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                                <li class="nav-item">
                                    <a href="javascript:void();" data-target="#matpel" data-toggle="pill" class="nav-link active"><i class="zmdi zmdi-book"></i> <span class="hidden-xs">Mata Pelajaran</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void();" data-target="#tambah" data-toggle="pill" class="nav-link"><i class="zmdi zmdi-collection-plus"></i> <span class="hidden-xs">Tambah</span></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="matpel">
                                    <div class="card-body">
						              	<div class="table-responsive">
						               		<table class="table table-content">
						                  		<thead align="center">
						                    		<tr>
                                                        <th style=" width: 50px;"> No </th>
						                      			<th>Mata Pelajaran</th>
						                      			<th style="width: 50px;">Action</th>
						                    		</tr>
						                  		</thead>
						                  		<tbody>
						                  			<?php 
                                                        $sql = "SELECT * FROM tb_matpel
                                                                order by nama_matpel ASC";
                                                        $query= mysqli_query($conn, $sql);
                                                        $n = 1;  
                                                        while($matpel = mysqli_fetch_array($query)){
                                                            echo "<tr>";
                                                            echo "<td>".$n++."</td>";
                                                            echo "<td>".$matpel['nama_matpel']. "</td>";
                                                            echo "<td>
                                                                    <a href='#' class='btn btn-primary' title='".$matpel['id_matpel']."' onclick='editMatpel(this)'><i class='icon-note'></i></a>
                                                                    <a href='#' class='btn btn-warning text-white' title='".$matpel['id_matpel']."' onclick='hapusMatpel(this)'><i class='icon-trash'></i></a>
                                                                </td>";
                                                            echo "</tr>";
                                                        }
                                                    ?>
						                  		</tbody>
						               		</table>
						              	</div>
						            </div>
                                </div>
                                <div class="tab-pane" id="tambah">
                                    <div class="card-body">
                                    	<h3 class="text-center">Tambah</h3><br>
                                    	<form action="matpel/proses_tambah_matpel.php" method="POST">
                                       		<div class="form-group row">
                                            	<label class="col-lg-2 col-form-label">Nama Mata Pelajaran :</label>
	                                            <div class="col-lg-10">
	                                                <input name="nama_matpel" class="form-control" type="text">
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
                                            	<label class="col-lg-2 col-form-label form-control-label"></label>
	                                            <div class="col-lg-10">
	                                                <input type="reset" class="btn btn-success" value="Reset">
	                                                <input type="submit" class="btn btn-primary" name="tambah_matpel" value="Tambah">
	                                            </div>
                                        	</div>
                                    	</form>
						            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal edit matpel-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="e_id_matpel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form action="matpel/proses_edit_matpel.php" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nip" class="col-lg-2 col-form-label form-control-label">ID Mata Pelajaran</label>
                        <div class="col-lg-10">
                            <input name="id_matpel" id="v_id_matpel" class="form-control" type="text" readonly="">
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nip" class="col-lg-2 col-form-label form-control-label">Nama</label>
                        <div class="col-lg-10">
                            <input name="nama_matpel" id="v_nama_matpel" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="hapusModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">HAPUS MATA PELAJARAN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">YAKIN MENGHAPUS MATA PELAJARAN ?</div>
                    <br><br>
                    <div class="pull-right">
                        <form action="matpel/proses_hapus_matpel.php" method="POST">
                            <input type="hidden" name="id_matpel" id="del_id_matpel" value="">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn btn-warning text-white">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <?php 
 	require_once('partials/footer.php');
?>

<script>

    function hapusMatpel(obj){
        var id_matpel = $(obj).attr('title');
        $('#hapusModal').modal('show');
        $('#del_id_matpel').val(id_matpel);
    }

    function editMatpel(obj){
        $('#editModal').modal('show');
        var id_matpel = $(obj).attr('title');
        $.ajax({
            url : '<?php echo "http://localhost/template-file/admin/matpel/data_matpel.php?id_matpel=" ?>'+id_matpel,
            type : 'GET',
            data : function(data){
                return JSON.stringfy(data);
            },
            success: function(data){
                console.log(data);
                var json = JSON.parse(data);
                $('#e_id_matpel').html('<i class="icon-note"></i> Edit data Matpel dengan Id Matpel : '+id_matpel);

                $('<div id="Vs"></div>_id_matpel').val(json.id_matpel);
                $('#v_id_matpel').val(json.id_matpel);
                $('#v_nama_matpel').val(json.nama_matpel);

            },
            error: function(data){
                console.log(data);
            }
        });
    }
    $('#search-field').on('keyup', function(){
        var value = $(this).val().toLowerCase();
        $(".table-content tr").each(function(index){
            if (!index) return;
            $(this).find("td").each(function () {
                var id = $(this).text().toLowerCase().trim();
                var not_found = (id.indexOf(value) == -1);
                $(this).closest('tr').toggle(!not_found);
                return not_found;
            });
        });
    });
 </script>