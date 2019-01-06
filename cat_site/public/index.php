<!-- **HOME PAGE**
Introduction
Header
Main Content
Data table
Footer -->

<!-- load all functions and database connection variable -
Need full file path here as path definitions are contained within start.php -->
<?php require_once'../private/start.php'; ?>

<!-- Set Page Title -->
<?php $page_title = 'Main Page'; ?>

<!-- get header -->
<?php include SHARED_PATH . '/header.php'; ?>

<!-- PAGE INTRO SECTION -->
<!-- get Introduction -->
<?php include SHARED_PATH . '/intro.php'; ?>

<!-- MAIN CONTENT SECTION -->
<!-- get table -->
<?php include SHARED_PATH . '/table.php'; ?>

<!-- get footer -->
<?php include SHARED_PATH . '/footer.php' ; ?>
