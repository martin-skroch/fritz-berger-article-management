{extends file="layouts/base.tpl"}

{block name="content"}
<div>
   {include 'components/heading.tpl' title="Produkt bearbeiten"}

   <form action="/index.php?action=update" method="post" class="space-y-4 mt-4">
         {include 'components/input.tpl' type="hidden" name="id" value="{$article.id|escape}" required=true}
         {include 'components/input.tpl' type="text" name="name" label="Name des Artikels" value="{$article.name|escape}" required=true}
         {include 'components/input.tpl' type="text" name="number" label="Artikelnummer" value="{$article.number|escape}" required=true}
         {include 'components/input.tpl' type="number" name="price" step="0.01" label="Verkaufspreis (€)" value="{$article.price|escape}" required=true}
         {include 'components/button.tpl' type="submit" label="Speichern"}
    </form>
</div>
{/block}