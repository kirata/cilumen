<!DOCTYPE html>
<html>
<head>
  <!--Let browser know website is optimized for mobile-->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
	<title><?=$title?></title>

	<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
  

</head>
<body>
  <nav class="" role="navigation">
    <div class="nav-wrapper container">
      <a href="<?=base_url();?>" class="brand-logo">Aplkasi CILUMEN</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="#mcreate" class="modal-trigger urlcreate">New</a></li>
        <li><a href="<?=base_url();?>">View Data</a></li>
        <li><a href="#">Logout</a></li>
      </ul>
    </div>
  </nav>    
<div class="container">
	<div class="row">
    <div class="col s12">
      <table class="responsive-table bordered highlight">
        <thead>
          <tr>
              <th data-field="no">Nomor</th>
              <th data-field="title" width="80%">Judul</th>
              <th data-field="author">Pilihan</th>
          </tr>
        </thead>

        <tbody>
        <?php $no=0;// print_r($books);?>
        <?php if(!$bookz_empty){foreach ($books as $val) {$no++;?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><a class="modal-trigger urldetail" href="#mdetail" data-key="<?=$val['id'];?>"><?=$val['title'];?></a></td>
            <td><a class="modal-trigger urlupdate" href="#mupdate" data-key="<?=$val['id'];?>">Update</a> | <a class="modal-trigger urldelete" href="#delete" data-key="<?=$val['id'];?>">Delete</a></td>
          </tr>
        <?php }}else{ ?>
          <td colspan="2"><center>Data Masih Kosong, Klik <a href="#mcreate" class="modal-trigger urlcreate">Disini</a> Untuk Mengisi</center></td>
        <?php } ?>
        </tbody>
      </table>
    </div>
	</div>
</div>
  <!-- Modal Structure -->
  <div id="mcreate" class="modal modal-fixed-footer">
    <form id="processCreate" method="POST">
      <div class="modal-content">
        <h4>Tambah Buku</h4>
        <hr/>
          <div class="row">
          <input type="hidden" id="txtId">
          <div class="input-field col s12">
            <input value=" " id="txtTitle" type="text" class="validate" name="title">
            <label class="active" for="first_name2">Judul</label>
          </div>
          <div class="input-field col s12">
            <input value=" " id="txtAuthor" type="text" class="validate" name="author">
            <label class="active" for="first_name2">Penulis</label>
          </div>
          <div class="input-field col s12">
            <input value=" " id="txtIsbn" type="text" class="validate" name="isbn">
            <label class="active" for="first_name2">ISBN</label>
          </div>
        </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="waves-effect waves-light btn" id="btnUpdate">Simpan</button>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Batal</a>
    </div>
  </form>
  </div>

  <div id="mdetail" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Detail Buku</h4>
      <hr/>
      <table>
          <tr>
            <td width="20%"><b>Judul</b></td>
            <td><label id="title"></label></td>
          </tr>
          <tr>
            <td width="20%"><b>Penulis</b></td>
            <td><label id="author"></label></td>
          </tr>
          <tr>
            <td width="20%"><b>ISBN</b></td>
            <td><label id="isbn"></label></td>
          </tr>
      </table>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat " id="closeDetail">Tutup</a>
    </div>
  </div>

  <div id="mupdate" class="modal modal-fixed-footer">
    <form id="processUpdate" method="POST">
      <div class="modal-content">
        <h4>Update Buku</h4>
        <hr/>
          <div class="row">
          <input type="hidden" id="txtId">
          <div class="input-field col s12">
            <input value=" " id="txtTitleUpdate" type="text" class="validate" name="title">
            <label class="active" for="first_name2">Judul</label>
          </div>
          <div class="input-field col s12">
            <input value=" " id="txtAuthorUpdate" type="text" class="validate" name="author">
            <label class="active" for="first_name2">Penulis</label>
          </div>
          <div class="input-field col s12">
            <input value=" " id="txtIsbnUpdate" type="text" class="validate" name="isbn">
            <label class="active" for="first_name2">ISBN</label>
          </div>
        </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="waves-effect waves-light btn" id="btnUpdate">Update</button>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Tutup</a>
    </div>
  </form>
  </div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript">
 $(document).ready(function(){
    $("table").effect("slide", "slow");
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
 $("form#processCreate").submit(function( event ){
    var data = $(this).serialize();
    $.ajax({
       type:'POST',
       data: data,
       url: 'http://localhost:8000/api/v1/book/',
       success:function (dt) {
        window.location.reload(true);
        toastr.info("Data Berhasil Disimpan");
       },
       error: function(e) {
        console.log("Gagal disimpan");
       }

     });
 });
 $(".urldetail").click(function( event ){
    var dataid = $(event.currentTarget).attr("data-key");
    $.ajax({
       type:'GET',
       dataType: 'json',
       url: 'http://localhost:8000/api/v1/book/'+dataid,
       success:function (dt) {
         $("#title").append(dt.title);
         $("#author").append(dt.author);
         $("#isbn").append(dt.isbn);
       }
     });
 });
 $(".urlupdate").click(function( event ){
    var dataid = $(event.currentTarget).attr("data-key");
    $.ajax({
       type:'GET',
       dataType: 'json',
       url: 'http://localhost:8000/api/v1/book/'+dataid,
       success:function (dt) {
        $("#txtIdUpdate").val(dt.id);
        $("#txtTitleUpdate").val(dt.title);
        $("#txtAuthorUpdate").val(dt.author);
        $("#txtIsbnUpdate").val(dt.isbn);
       }
     });
 });
 $("form#processUpdate").submit(function( event ){
    var data = $(this).serialize();
    var id = $("#txtId").val();
    $.ajax({
       type:'POST',
       data: data,
       url: 'http://localhost:8000/api/v1/book/'+id,
       success:function (dt) {
        window.location.reload(true);
        toastr.info("Data Berhasil Diubah");
       },
       error: function(dt) {
        console.log("Gagal diubah");
       }

     });
 });
 $(".urldelete").click(function( event ){
    if (confirm("Apakah Anda Yakin ?")) {
      var dataid = $(event.currentTarget).attr("data-key");
      $.ajax({
         type:'DELETE',
         dataType: 'json',
         url: 'http://localhost:8000/api/v1/book/'+dataid,
         success:function (dt) {
          window.location.reload(true);
         },
         error: function(e){
          window.location.reload(true);
          console.log("Gagal Hapus");
         }
     });
    }
    else {
      window.location.reload(true);
    }
 });
 $("#closeDetail").click(function(event){
    $("#title").empty();
    $("#author").empty();
    $("#isbn").empty();
 });
</script>
</body>
</html>