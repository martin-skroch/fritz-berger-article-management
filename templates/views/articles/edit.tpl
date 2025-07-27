{extends file="layouts/base.tpl"}

{block name="content"}
<div class="space-y-4">
    {include 'components/heading.tpl' title="Artikel bearbeiten"}

    <div class="p-8 bg-white shadow md:rounded">
        <form action="/index.php?action=update" method="post" class="space-y-6">
            {include 'components/input.tpl' type="text" name="name" label="Artikelname" value="{$smarty.session.validation.data.name|escape ?? $article.name|escape}" invalid=$smarty.session.validation.errors.name|default:null required=true}
            {include 'components/input.tpl' type="text" name="number" label="Artikelnummer" value="{$smarty.session.validation.data.number|escape ?? $article.number|escape}" invalid=$smarty.session.validation.errors.number|default:null required=true}
            {include 'components/input.tpl' type="number" name="price" step="0.01" label="Verkaufspreis (€)" value="{$smarty.session.validation.data.price|escape ?? $article.price|escape}" invalid=$smarty.session.validation.errors.price|default:null required=true}
            {include 'components/input.tpl' type="hidden" name="id" value="{$article.id|escape}" required=true}
            {include 'components/button.tpl' type="submit" label="Speichern"}
        </form>
    </div>
</div>
{/block}
