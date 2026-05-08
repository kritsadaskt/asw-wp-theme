<?php
$project_id = get_field('project_code', get_the_ID());
$api_url = 'https://aswservice.com/hotdealapi/Unit/GetUnits?projectIDs=' . urlencode($project_id) . '&perPage=4&sortingUnit=DESC';
$response = wp_remote_get($api_url);
if (!is_wp_error($response)) {
  $body = wp_remote_retrieve_body($response);
  $data = json_decode($body, true);
  $units = $data['data']['units'];
}
?>
<style>
  #related-project {
    padding-bottom: 0;
  }
</style>
<?php if (!empty($units) && is_array($units)) { ?>
<div class="container mx-auto py-10 px-4 md:px-0">
  <h3 class="text-4xl font-medium text-neutral-900">ยูนิต Hot Deal 🔥</h3>
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-5">
    <?php foreach ($units as $unit) {?>
      <div class="unit-box border rounded-b-md shadow bg-white">
        <div class="unit-thumbnail relative">
          <?php if (!empty($unit['highlightText'])) { ?>
            <div class="absolute bg-orange-500 text-white lg:right-4 right-1 -bottom-4 rounded-full py-1 px-4 leading-none text-center lg:text-[24px] text-[18px] font-medium text-white z-[2]">
              <?= $unit['highlightText'] ?>
            </div>
          <?php } ?>
          <?php if ($unit['headerImage']['resource']['filePath'] !== null) { ?>
            <img src="https://aswservice.com/hotdeal/<?= $unit['campaignOverlay']['resource']['filePath'] ?>" alt="" class="object-cover lg:w-[320px] lg:h-[320px] w-[200px] h-[200px] rounded-tl-md rounded-tr-md absolute top-0 left-0 z-[1]" style="aspect-ratio: 1/1;">
          <?php } ?>
          <img src="https://aswservice.com/hotdeal/<?= $unit['headerImage']['resource']['filePath'] ?>" alt="" class="object-cover lg:w-[320px] lg:h-[320px] w-[200px] h-[200px] rounded-tl-md rounded-tr-md" style="aspect-ratio: 1/1;">
        </div>
        <div class="unit-detail p-4 flex flex-col items-start justify-between">
          <div class="font-bold text-4xl"><?= esc_html($unit['unitCode'] ?? '-') ?></div>
          <p class="lg:text-[24px] text-[18px] text-[#1e9f9b] font-medium"><?= $unit['modelName'] ?></p>
          <div class="text-[18px] lg:text-2xl">พิเศษ <span class="text-red-600 font-semibold text-[26px] lg:text-4xl"><?= number_format($unit['discountPrice'] ?? 0) ?> </span> ล้าน</div>
          <div class="lg:h-5 h-3"></div>
          <a href="https://assetwise.co.th/hotdeal/unit?id=<?= $unit['id'] ?>" target="_blank" class="text-white bg-primary rounded-md px-4 py-2 bg-[#123F6D] shrink-0">ดูรายละเอียด</a>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<?php } ?>