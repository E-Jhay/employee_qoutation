<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../images/pmc-ico.png">
    <!-- <style>
        @page {
            size:A4 portrait;
            -webkit-print-color-adjust: exact;
        }
    </style> -->
    
<style>
  /* Styles for the watermark */
  @media print {
    body::after {
    -webkit-print-color-adjust: exact !important;   /* Chrome, Safari */
    color-adjust: exact !important;  
      content: "";
      /* transform: rotate(180deg); */
      position: fixed;
      top: 50%;
      left: 25%;
      width: 50%;
      height: 10%;
transform: translate(-50%, -50%);
transform: rotate(-40deg);
      /* background-color: red; */
      
      background-image: url('../images/logo.png'); /* Replace 'watermark.png' with your watermark image */
      background-repeat: no-repeat; /* Repeat the watermark */
      background-size: contain; /* Size of the watermark */
      opacity: 0.2; /* Adjust the opacity as needed */
      z-index: -1; /* Place the watermark behind other content */
    }
  }
</style>
</head>
<body>
   <div id="app">