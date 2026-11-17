
		<div class="glass-box w-100 p-4 bg-transparent ">
		    <h1 class="text-center fw-light mb-4">
		        Log In
		    </h1>
			<form id="sendLogin" method="POST" action=<?php echo site_url('/processLogin')?> class="">
				<div class="mb-3">
					<input type="email" id="email" name="email" requiered
						placeholder="email@email.com"
						class="form-control form-control-lg form-control-custom" />
				</div>
				<div class="mb-4">
					<input type="password" id="password" name="password" requiered
						placeholder="password"
						class="form-control form-control-lg form-control-custom" />
				</div>

				<button id="login" type="submit" form="sendLogin"
					class="btn btn-login w-100 py-2 fw-bold" >
					LOG	IN
				</button>
			</form>
			<div class="mt-2 text-center">

				<!-- Button trigger modal -->
				<button type="button" class="login-link" data-bs-toggle="modal"
					data-bs-target="#exampleModal">
					OU INSCRIVEZ VOUS</button>
			</div>
		</div>	
    