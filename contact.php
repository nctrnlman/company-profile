<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<title>Contact | MAA GROUP</title>

	<meta name="keywords" content="Company Profile" />
	<meta name="description" content="Maa Group" />
	<meta name="author" content="MAA" />

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/demos/business-consulting-3/favicon.png" type="image/x-icon" />
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png" />

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no" />

	<!-- Web Fonts  -->
	<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css" />

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css" />
	<link rel="stylesheet" href="vendor/animate/animate.compat.css" />
	<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css" />
	<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css" />
	<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css" />
	<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/theme.css" />
	<link rel="stylesheet" href="css/theme-elements.css" />
	<link rel="stylesheet" href="css/theme-blog.css" />
	<link rel="stylesheet" href="css/theme-shop.css" />

	<!-- Demo CSS -->
	<link rel="stylesheet" href="css/demos/demo-business-consulting-3.css" />

	<!-- Demo CSS -->
	<link rel="stylesheet" href="css/demos/demo-construction.css" />

	<!-- Skin CSS -->
	<link id="skinCSS" rel="stylesheet" href="css/skins/skin-business-consulting-3.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="css/custom.css" />

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- Head Libs -->
	<script src="vendor/modernizr/modernizr.min.js"></script>
</head>


<?php include 'navbar.php'; ?>

<body>
	<div role="main" class="main">
		<section class="section section-with-shape-divider page-header page-header-modern page-header-lg border-0 my-0 lazyload" style="background-size: cover; background-position: center; background-color: #af2a25">
			<div class="container pb-5 my-3">
				<div class="row mb-4">
					<div class="col-md-12 align-self-center p-static order-2 text-center">
						<h1 class="font-weight-bold text-color-white text-10" style="text-shadow: 5px 5px 10px black;">Contact Us</h1>
					</div>
				</div>
			</div>
			<div class="shape-divider shape-divider-bottom shape-divider-reverse-x" style="height: 123px;">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 123" preserveAspectRatio="xMinYMin">
					<polygon fill="#c6a265" points="0,90 221,60 563,88 931,35 1408,93 1920,41 1920,-1 0,-1 " />
					<polygon fill="#FFFFFF" points="0,75 219,44 563,72 930,19 1408,77 1920,25 1920,-1 0,-1 " />
				</svg>
			</div>
		</section>

		<script>
			document.addEventListener('DOMContentLoaded', function() {
				<?php if (isset($_SESSION['success_message'])) { ?>
					Swal.fire({
						icon: 'success', // Ikonya bisa diganti dengan 'error', 'warning', dll.
						text: '<?php echo $_SESSION['success_message']; ?>',

						showConfirmButton: false,
						timer: 3000
					});
					<?php unset($_SESSION['success_message']); ?>
				<?php } ?>

				<?php if (isset($_SESSION['error_message'])) { ?>
					Swal.fire({
						icon: 'error',
						text: '<?php echo $_SESSION['error_message']; ?>',

						showConfirmButton: false,
						timer: 3000
					});
					<?php unset($_SESSION['error_message']); ?>
				<?php } ?>
			});
		</script>

		<section class="section section-height-3 bg-light border-0 pt-4 m-0 lazyload" data-bg-src="img/demos/business-consulting-3/backgrounds/background-6.jpg" style="background-size: 100%; background-repeat: no-repeat;">
			<div class="container py-4">
				<div class="row box-shadow-4 mx-3 mx-xl-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
					<div class="col-lg-6 px-0">
						<div class="bg-light h-100">
							<div class="d-flex flex-column justify-content-center p-5 h-100 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
								<div class="pb-5 mb-4 mt-5 mt-lg-0">
									<div class="d-flex flex-column flex-md-row align-items-center justify-content-center pe-lg-4">
										<img width="140" height="70" src="img/demos/business-consulting-3/logo-MAA-component.png" alt="Location" />
										<div class="text-center text-md-start ps-md-3">
											<h2 class="font-weight-semibold text-6 mb-1">MAA GROUP</h2>
											<p class="text-3-5 mb-0">APL Tower Lt. 38 Suite T5-6, Jl. Letjen S. Parman No.Kav. 28, RT.3/RW.5<br>Kec. Grogol petamburan<br>Daerah Khusus Ibukota Jakarta 11470</p>

										</div>
									</div>
								</div>
								<div class="row justify-content-center mb-5 mb-lg-0">
									<div class="col-auto text-center mx-auto mb-4 mb-xl-0">
										<h3 class="font-weight-semibold text-color-primary text-3-5 mb-0">SUPPORT</h3>
										<div class="d-flex justify-content-center">
											<img width="25" height="25" src="img/demos/business-consulting-3/icons/phone.svg" alt="Phone Icon" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
											<a href="tel:8001234567" class="text-color-dark text-color-hover-primary font-weight-semibold text-decoration-none text-6 ms-2">+621-2967-0591</a>
										</div>
									</div>

									<!-- <div class="col-auto text-center me-xl-auto">
												<h3 class="font-weight-semibold text-color-primary text-3-5 mb-0">SALES</h3>
												<div class="d-flex">
													<img width="25" height="25" src="img/demos/business-consulting-3/icons/phone.svg" alt="Phone Icon" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
													<a href="tel:8001234567" class="text-color-dark text-color-hover-primary font-weight-semibold text-decoration-none text-6 ms-2">+800-1223-4567</a>
												</div>
											</div> -->
									<div class="col-auto text-center pt-4 mt-5">
										<h3 class="font-weight-semibold text-color-primary text-3-5 mb-0">SEND AN EMAIL</h3>
										<div class="d-flex">
											<img width="25" height="25" src="img/demos/business-consulting-3/icons/email.svg" alt="Email Icon" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
											<a href="mailto:contact@portotheme.com" class="text-color-dark text-color-hover-primary text-decoration-underline font-weight-semibold text-5-5 wb-all ms-2">maa@gmail.com</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 px-0">
						<div class=" h-100" style="background-color: #af2a25;">
							<div class="text-center text-md-start p-5 h-100 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750">
								<h2 class="text-color-light font-weight-medium mb-4 mt-5 mt-lg-0">Send Us a Message and Learn More About Our Services</h2>
								<p class="text-3-5 font-weight-medium mb-4 text-color-white">Feel free to contact us and discover more about the services we offer. Our team is ready to assist you. </p>

								<form class="" method="POST" action="contact-form.php">
									<div class="row">
										<div class="form-group col">
											<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control text-3 custom-border-color-grey-1 h-auto py-2" name="name" placeholder="* Full Name" required>
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 custom-border-color-grey-1 h-auto py-2" name="email" placeholder="* Email Address" required>
										</div>
									</div>
									<div class="row mb-4">
										<div class="form-group col">
											<textarea maxlength="5000" data-msg-required="Please enter your message." rows="8" class="form-control text-3 custom-border-color-grey-1 h-auto py-2" name="message" placeholder="* Message" required></textarea>
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<button type="submit" class="btn  custom-btn-style-1 font-weight-semibold btn-px-4 btn-py-2 text-3-5" data-loading-text="Loading..." data-cursor-effect-hover="plus" data-cursor-effect-hover-color="light" style="background-color: white;">
												<span>Send Message</span>
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>



	</div>
	<?php include 'footer.php'; ?>

	<script src="sweetalert2.all.min.js"></script>
	<!-- Vendor -->
	<script src="vendor/plugins/js/plugins.min.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="js/theme.js"></script>

	<!-- Current Page Vendor and Views -->
	<script src="js/views/view.contact.js"></script>

	<!-- Theme Custom -->
	<script src="js/custom.js"></script>

	<!-- Theme Initialization Files -->
	<script src="js/theme.init.js"></script>


	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>


</body>

</html>