{extends file="layouts/base.tpl"}

{block name="content"}
<div>
   {include 'components/heading.tpl' title="Produkt erstellen"}

   <form action="/index.php?action=store" method="post" class="space-y-4 mt-4">
         {include 'components/input.tpl' type="text" name="name" label="Name des Artikels" required=true}
         {include 'components/input.tpl' type="text" name="number" label="Artikelnummer" required=true}
         {include 'components/input.tpl' type="number" name="price"  step="0.01" label="Verkaufspreis (€)" required=true}
         {include 'components/button.tpl' type="submit" label="Speichern"}
    </form>
</div>
{/block}