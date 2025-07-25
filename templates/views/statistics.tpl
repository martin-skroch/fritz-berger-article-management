{extends file="layouts/base.tpl"}

{block name="content"}
<div>
   {include 'components/heading.tpl' title="Statistiken"}

   <table class="w-full border mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-3 text-start">Nummern-Bereich</th>
                <th class="p-3 text-center">Artikel</th>
                <th class="p-3 text-end">Gesamtpreis</th>
            </tr>
        </thead>
        <tbody>
            {foreach $statistics as $entry}
            <tr class="border-t">
                <td class="p-3 text-start">{$entry.prefix}</td>
                <td class="p-3 text-center">{$entry.count}</td>
                <td class="p-3 text-end">{$entry.total_price|number_format:2:",":"."} €</td>
            </tr>
            {/foreach}
        </tbody>
    </table>
</div>
{/block}