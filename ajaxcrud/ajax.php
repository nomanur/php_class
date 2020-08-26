<!DOCTYPE html>
<html>
<head>
	<title>ajax crud</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	
	<style type="text/css">
		input[type="text"] {
    width: 289px;
    border-radius: 5px;
}

#ajax_table{
	text-align: center;
}
#update_btn{
	visibility: hidden;
}
	</style>


	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<form id="submit_form">
					<input id="name" type="text" name="name" placeholder="type your name">
					<input id="email" type="text" name="email" placeholder="type your email">
					<input id="address" type="text" name="address" placeholder="type your address">
					<button id="submit_btn" class="btn btn-primary">Submit</button>
					<button id="update_btn" class="btn btn-primary">Update</button>
					<input type="hidden" name="updatehidden" id="upid">
				</form>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<table id="ajax_table" width="100%" cellspacing="0" cellpadding="0" border="1">
					<thead>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th></th>
					</thead>
					<tbody id="ajax_body">
						
					</tbody>
				</table>
			</div>
		</div>
	</div>






		<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>

			<script type="text/javascript">
				
				let name = document.getElementById('name'),
					email = document.getElementById('email'),
					address = document.getElementById('address'),
					submit_form = document.getElementById('submit_form'),
					del = document.getElementById('delete'),
					submit_btn = document.getElementById('submit_btn'),
					update_btn = document.getElementById('update_btn'),
					upId = document.getElementById('upid');

				document.getElementById('submit_btn').addEventListener('click',submitinfo);


				document.addEventListener('DOMContentLoaded', function(){
					getinfo()

					console.log(upId)
				});


				function getinfo(){
					$.ajax({
						url: 'insert.php',
						method:'POST',
						data:{
							action: 'getinfo'
						}
					}).done(function(response){
						document.getElementById('ajax_body').innerHTML = response
					})
				}

				function submitinfo(e){
					e.preventDefault();
					$.ajax({
						url:'insert.php',
						method:'POST',
						data:{
							name: name.value,
							email: email.value,
							address: address.value,
							action: 'insert'
						}
					}).done(function(response){
						alert('Data inserted successfullly')
						submit_form.reset()
					}).fail(function(error){
						console.log(error)
					}).always(function(){
						getinfo()
					})
				}


				ajax_body.addEventListener('click', remove);


				function remove(e){

					if (e.target.classList.contains('update')) {
						let id = e.target.getAttribute('upd');

						$.ajax({
							url:'insert.php',
							method:'POST',
							dataType:'JSON',
							data:{
								action:'updateinfo',
								id: id
							}
						}).done(function(response){
							name.value = response.name
							email.value = response.email
							address.value = response.address
							upId.value = response.id
						}).always(function(){
							submit_btn.style.display = 'none'
							update_btn.style.visibility = 'visible'
						})
					}


					if (e.target.classList.contains('remove')) {
						let id = e.target.getAttribute('del');
						if (confirm('r u sure')) {
						$.ajax({
							url: 'insert.php',
							method:'POST',
							data:{
								id: id,
								action:'delete'
							}
						}).done(function(response){
							alert('Data deleted successfullly')
						}).always(function(){
							getinfo()
						})
					}
					}
				}


				update_btn.addEventListener('click', updaterow);

				function updaterow(e){
					e.preventDefault()
					$.ajax({
						url:'insert.php',
						method:'POST',
						data:{
							action: 'updaterow',
							name : name.value,
							email : email.value,
							address: address.value,
							id: upid.value
						}
					}).done(function(response){

					}).always(function(){
						getinfo()
					})
				}
				


			



			</script>
</body>
</html>