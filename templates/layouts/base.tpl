<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <title>Artikelverwaltung</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-50 text-gray-900 font-sans min-h-screen flex flex-col">

        <header class="bg-[#004481] text-white shadow">
            <div class="max-w-6xl mx-auto flex justify-between items-center">
                <div class="text-xl font-bold uppercase">Artikelverwaltung</div>

                <nav class="flex">
                    {include 'components/nav-item.tpl' href="/index.php" label="Artikel"}
                    {include 'components/nav-item.tpl' href="/index.php?action=statistics" label="Statistiken"}
                </nav>
            </div>
        </header>

        <main class="flex-grow">          
            <div class="max-w-6xl mx-auto py-6">
                {block name="content"}{/block}
            </div>
        </main>

    </body>
</html>
