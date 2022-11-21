<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets\plugins\bootstrap-5.2.2\css\bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets\css\admin\admin.css'); ?>">
    <script src="<?= base_url('assets\plugins\jquery\script.js'); ?>"></script>
    <script src="<?= base_url('assets\plugins\ckeditor5-build-classic\ckeditor.js'); ?>"></script>
    <title><?= $title; ?></title>
</head>

<body>
    <?php $this->load->view('layouts/admin/navbar') ?>
    <main>
        <?php $this->load->view('layouts/admin/sidebar') ?>
        <section class="content">