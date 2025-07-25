{extends file="layouts/base.tpl"}

{block name="content"}
<div>
   <div class="flex items-center justify-between mb-4">
      {include 'components/heading.tpl' title="Produkte"}
      {include 'components/button.tpl' type="link" href="/index.php?action=create" label="Artikel erstellen"}
   </div>

   <div class="space-y-4">
   
      {foreach $articles as $article}
      <div class="bg-white shadow rounded px-4 py-3 flex items-center">
         <div class="w-3/6 font-bold">{$article.name|escape}</div>
         <div class="w-1/6 text-center">
            <div class="inline-flex items-center rounded-md bg-stone-100 align-middle overflow-hidden">
               <a href="index.php?action=edit&id={$article.id}" class="p-3 text-blue-600 hover:bg-blue-600 focus:text-white focus:bg-blue-600 hover:text-white border-r" title="Bearbeiten">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 256 256"><path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM51.31,160,136,75.31,152.69,92,68,176.68ZM48,179.31,76.69,208H48Zm48,25.38L79.31,188,164,103.31,180.69,120Zm96-96L147.31,64l24-24L216,84.68Z"></path></svg>
               </a>
               <a href="index.php?action=delete&id={$article.id}" class="p-3 text-red-600 hover:bg-red-600 hover:text-white focus:bg-red-600 focus:text-white" title="Löschen">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path></svg>
               </a>
            </div>
         </div>
         <div class="w-1/6 text-center">Art-Nr.: {$article.number|escape}</div>
         <div class="w-1/6 text-end">{$article.price|number_format:2:",":"."} €</div>
      </div>
      {foreachelse}
         Keine Artikel
      {/foreach}



   </div>
</div>
{/block}