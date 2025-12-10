<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>404 | Not Found</title>
  <style>
    #overlay {
      mask-image: radial-gradient(circle 120px at 50% 50%,
          transparent 0%,
          black 150px);
      -webkit-mask-image: radial-gradient(circle 120px at 50% 50%,
          transparent 0%,
          black 150px);
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body>
  <div class="relative w-screen h-screen bg-gray-900 text-white overflow-hidden">
    <!-- Main content hidden by default, revealed by spotlight -->
    <div class="absolute inset-0 flex flex-col items-center justify-center z-10">
      <h1 class="text-6xl font-bold mb-4">Page Not Found</h1>
      <p class="text-xl">
        Sorry, we couldn’t find the page you’re looking for.
      </p>
      <a href="/" class="mt-6 px-4 py-2 bg-blue-600 hover:bg-blue-500 rounded">Go Home</a>
    </div>


    <!-- Dark overlay with spotlight mask -->
    <div id="overlay" class="absolute inset-0 bg-black z-20 pointer-events-none">
    </div>
    <script>
      const overlay = document.getElementById("overlay");
      window.addEventListener("mousemove", (e) => {
        const x = e.clientX;
        const y = e.clientY;
        const pos = `${x}px ${y}px`;
        overlay.style.maskImage = `radial-gradient(circle 120px at ${pos}, transparent 0%, black 150px)`;
        overlay.style.webkitMaskImage = overlay.style.maskImage;
      });
    </script>
</body>

</html>
