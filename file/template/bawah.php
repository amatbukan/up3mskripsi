
	<div class="modal fade" id="modalBox" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
				<!-- isi modal -->
				</div>
			</div>
		</div>
	</div>
    <script src="../../assets/js/jquery.min.js"></script>
	<script src="../../assets/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/js/bootstrap-datepicker.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/sb-admin-2.js"></script>
    <script src="../../assets/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
	// DataTable
	$(function () {
		$("#modif").DataTable({         
		  "language": {
			"url": "../../assets/js/Indonesian.json",
			"sEmptyTable": "Tidak ada data di database"
		}
		});
	  
	  });
	  
	// modal  
	function tampilkanModal(file) {
		var myfile = file;
		$('#modalBox').modal('show');
		$('#modalBox .modal-body').load(myfile);
	}
	
	// popup button
	$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
	});
	// datepicker (tanggal)
	$('#tgl, #tgl2').datepicker({format:'yyyy-mm-dd'});
	
	//notifikasi transisi 
	window.setTimeout(function() { $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 1500);
	window.setTimeout(function() { $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 1500);

	// hanya angka
	function hanyaAngka(evt) {
	  var charCode = (evt.which) ? evt.which : event.keyCode
	   if (charCode > 31 && (charCode < 48 || charCode > 57))

		return false;
	  return true;
	}

	</script>
</body>

</html>
