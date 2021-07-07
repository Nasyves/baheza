<main>
	<div class="wrapper-main">
		<section class="section-default">
			<h1>Reset your password</h1>
			<p>An e-mail will be sent to you with instructions on how to reset your password.</p>
			<form action="includes/reset-request.inc.php" method="post">
				<input type="email" name="email" placeholder="Enter your email">
				<button type="submit" name="reset-request-submit">Receive new password by email</button>
			</form>
			<?php
				if (isset($_GET["reset"])) {
					if ($_GET["reset"] == "success") {
						echo '<p class="signupsuccess">Check your email!</p>';
					}
				}
			?>
		</section>
	</div>
</main>