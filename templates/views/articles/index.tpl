{extends file="layouts/base.tpl"}

{block name="content"}
<div>
    <div class="md:flex md:items-center md:justify-between mb-4 max-md:px-4 max-md:space-y-4">
        {include 'components/heading.tpl' title="Artikel"}
        {include 'components/button.tpl' type="link" href="/index.php?action=create" label="Artikel erstellen"}
    </div>

    <div class="space-y-px md:space-y-4">
        {foreach $articles as $article}
        <div class="grid grid-cols-2 md:grid-cols-4 items-center gap-3 px-4 py-3 bg-white shadow md:rounded">
            <div class="max-md:order-1 font-bold">
                {$article.name|escape}
            </div>
            <div class="max-md:order-3 md:text-center">
                Art-Nr.: {$article.number|escape}
            </div>
            <div class="max-md:order-2 text-end">
                {$article.price|number_format:2:",":"."} €
            </div>
            <div class="max-md:order-4 text-end inline-flex items-center justify-end gap-2">
                <a href="index.php?action=edit&id={$article.id}" class="text-stone-500 hover:bg-blue-500 hover:text-white rounded-full p-2" title="Artikel Bearbeiten">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 256 256"><path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM51.31,160,136,75.31,152.69,92,68,176.68ZM48,179.31,76.69,208H48Zm48,25.38L79.31,188,164,103.31,180.69,120Zm96-96L147.31,64l24-24L216,84.68Z"></path></svg>
                </a>
                <a href="index.php?action=delete&id={$article.id}" onclick="return confirm('Den Artikel &quot;{$article.name|escape}&quot; wirklich löschen?');" class="text-stone-500 hover:bg-red-500 hover:text-white rounded-full p-2" title="Artikel Löschen">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path></svg>
                </a>
            </div>
        </div>
        {foreachelse}
            Keine Artikel
        {/foreach}
    </div>
</div>
{/block}
