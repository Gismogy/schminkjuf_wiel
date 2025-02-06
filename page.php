<?php

$facebook = $_SESSION["fNames"];
$instagram = $_SESSION["iNames"];
$allnames = $_SESSION["aNames"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tables</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        // Function to copy data to clipboard with line breaks
        function copyToClipboard(data) {
            const textarea = document.createElement("textarea");
            // Replace commas with line breaks for each set of names
            textarea.value = data.replace(/, /g, "\n");
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            alert("Data copied to clipboard!");
        }
    </script>
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-8">
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">SchimnkJuf Facebook & Instagram | ACTIE 6-2-2025 | <a target="_blank" class="bg-yellow-500 ml-5 text-black px-4 py-2 rounded mt-4" href="https://wheelofnames.com/2cy-ymc">Al ingevulde wiel</a>    <a target="_blank" class="bg-yellow-500 ml-5 text-black px-4 py-2 rounded mt-4" href="https://wheelofnames.com/">Eigen wiel maken</a></h1>
    </div>
    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
     <div class="flex space-x-6 mb-6">
        <h2 class="text-xl font-semibold ">Instructies als je het wilt updaten: </h2> <br>
         1. Klik op copy een lijst. (de gene waar je een rad van wilt hebben) <br>
         2. Klik op "naar het wiel"<br>
         3. Plak je lijst (ctrl + V) Of rechtermuisklik en plakken<br>
         4. Wacht tot het erin staat.(kan even duren) <br>
         5. Have fun <br>
     </div>
    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
    <!-- Flex container for side-by-side tables -->
    <div class="flex space-x-6 mb-6">
        <!-- All Names Table -->
        <div class="w-1/3">
            <h2 class="text-xl font-semibold ">Alle Namen</h2>
            <table class="min-w-full table-auto bg-white shadow-lg rounded-lg">
                <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border">Gebruikers</th>
                    <button
                            class="mb-3 bg-blue-500 text-white px-4 py-2 rounded mt-4"
                            onclick="copyToClipboard('<?php echo htmlspecialchars(implode(", ", $allnames)); ?>')"
                    >
                        Copy All Names
                    </button>
                </tr>
                </thead>
                <tbody>
				<?php foreach ($allnames as $name): ?>
                    <tr>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($name) ?></td>
                    </tr>
				<?php endforeach; ?>
                </tbody>
            </table>

        </div>

        <!-- Facebook Names Table -->
        <div class="w-1/3">
            <h2 class="text-xl font-semibold ">Facebook Names</h2>
            <table class="min-w-full table-auto bg-white shadow-lg rounded-lg">
                <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border">Name</th>
                </tr>
                <button
                        class="mb-3 bg-green-500 text-white px-4 py-2 rounded mt-4"
                        onclick="copyToClipboard('<?php echo htmlspecialchars(implode(", ", $facebook)); ?>')"
                >
                    Copy Facebook Names
                </button>
                </thead>
                <tbody>
				<?php foreach ($facebook as $name): ?>
                    <tr>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($name) ?></td>
                    </tr>
				<?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Instagram Names Table -->
        <div class="w-1/3">
            <h2 class="text-xl font-semibold ">Instagram Names</h2>
            <table class="min-w-full table-auto bg-white shadow-lg rounded-lg">
                <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border">Name</th>
                </tr>
                <button
                        class="mb-3 bg-yellow-500 text-white px-4 py-2 rounded mt-4"
                        onclick="copyToClipboard('<?php echo htmlspecialchars(implode(", ", $instagram)); ?>')"
                >
                    Copy Instagram Names
                </button>
                </thead>
                <tbody>
				<?php foreach ($instagram as $name): ?>
                    <tr>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($name) ?></td>
                    </tr>
				<?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>

</body>
</html>
