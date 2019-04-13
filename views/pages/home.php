<?php include '../views/partials/head.php'; ?>

<img src="<?= URL ?>assets/images/logo.svg" class="logo" alt="logo" />
<div class="container_information">
    <h1>Welcome</h1>
    <p>Poster can be one of the effective marketing and advertising materials.
        It is also a great tool to use when you want to present your services to a new league or as a point of
        sale display on picture day.
        The poster must
    </p>
    <div class="btnwrap">
        <div class="btn1"><a href="<?= URL ?>create">Create a new Party</a></div>
        <div class="btn2"><a href="<?= URL ?>join">Join a party</a></div>
    </div>
</div>
<div class="container_image">
    <img class="bg" src="<?= URL ?>assets/images/bg.svg" alt="background">
    <img class="illustration" src="<?= URL ?>assets/images/image.svg" alt="illustration" />
</div>

<?php include '../views/partials/footer.php';