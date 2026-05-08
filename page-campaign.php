<?php
/**
 * Template Name: ASW Campaign
 * Template Post Type: promotion
 * @package SeedSpring
 */

 $fields = get_fields();
 $hero_banner = $fields['hero_banner'];
 $settings = $fields['page_setting'];
 $cmp_detail = $fields['campaign_detail'];

function clean_string($string) {
    // Remove zero-width space characters from string
    $string = str_replace('​', '', $string); // Remove zero-width space (U+200B)
    $string = str_replace('‌', '', $string); // Remove zero-width non-joiner (U+200C)
    $string = str_replace('‍', '', $string); // Remove zero-width joiner (U+200D)
    $string = trim($string);
    return $string;
}
?>
<?php get_header() ?>

<style>
  .tab-button {
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2);
    background-color: white;
    color: #333;
    padding: 5px 13px 5px 10px;
    border-radius: 50px;
  }
  .tab-button.active {
    color: #fff;
    background-color: #22c55e;
    border-color: #16a34a;
  }

  .project-item.checked .project-checkbox .checkbox-border {
    fill: #006fee;
  }
  .project-item .project-checkbox .checkmark {
    stroke: #fff;
    opacity: 0;
  }
  .project-item.checked .project-checkbox .checkmark {
    opacity: 1;
  }

  .project_status-badge.status-new_project {
    background: linear-gradient(to right, #15803d, #22c55e);
  }

  .project_status-badge.status-ready_project {
    background: linear-gradient(to right, #f97316, #c2410c);
  }

  form#register_form input, form#register_form select {
    font-size: 22px;
  }

  #register_section {
    background: url('https://assetwise.co.th/wp-content/uploads/2025/09/w-bg.svg'), linear-gradient(to bottom, #195897, #123f6d);
    background-repeat: no-repeat;
  }
  #register_section label, #register_section h2 {
    color: #fff;
  }
  #register_section button.disabled {
    opacity: 0.5;
    cursor: not-allowed;
  }
  #register_section button.loading {
    opacity: 0.5;
    cursor: not-allowed;
  }
  #register_section .field-error {
    color: #ff7a55;
    font-size: 20px;
    line-height: none;
    margin-top: 4px;
    display: block;
  }
  #register_section input.error,
  #register_section select.error {
    border-color: #ef4444;
    border-width: 2px;
  }
  #register_section input.error:focus,
  #register_section select.error:focus {
    border-color: #ef4444;
    box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.2);
  }
  #register_section input[type="checkbox"].error {
    border-color: #ef4444;
    outline: 2px solid #ef4444;
    outline-offset: 2px;
  }
  #register_section .checkbox-error {
    color: #fca5a5;
    font-size: 14px;
    margin-top: 4px;
    display: block;
  }
</style>

<?php if ($hero_banner) : ?>
  <section id="banner">
    <?php foreach ($hero_banner as $banner) : ?>
      <div class="banner-item">
        <img id="banner_desktop" src="<?php echo $banner['desktop_banner']['url']; ?>" alt="<?php echo $banner['desktop_banner']['alt']; ?>" class="desktop-only">
        <img id="banner_mobile" src="<?php echo $banner['mobile_banner']['url']; ?>" alt="<?php echo $banner['mobile_banner']['alt']; ?>" class="mobile-only">
      </div>
    <?php endforeach; ?>
  </section>
<?php endif; ?>

<hr/>

<?php if ($settings['display_type'] == 'default') : ?>
  <p>This is Default layout</p>
<?php elseif ($settings['display_type'] == 'group') : ?>
  <section id="projects_selector">
    <div class="container mx-auto">
      <?php if ($settings['group_project']) : ?>
        <div class="flex items-center py-8">
          <nav class="flex gap-4 justify-center w-full">
            <?php foreach ($fields['projects_selector_group'] as $group) : ?>
              <button class="projects-selector-item w-1/4 min-h-10 bg-gray-200 rounded-lg p-5 border-2 border-gray-400" data-group="<?php echo $group['project_group']['group_name']; ?>">
                <?php print_r($group['project_group']['group_name']); ?>
              </button>
            <?php endforeach; ?>
          </nav>
        </div>
        <div class="projects-selector-wrapper">
          <div class="projects-selector-item"></div>
        </div>
      <?php else : ?>
        <div class="projects-selector-wrapper">
          <div class="projects-selector-item"></div>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php elseif ($settings['display_type'] == 'tabs') : ?>
    <div class="tabs-container">
      <div class="w-full">
        <div class="campaign-details pt-10 px-4 md:px-0">
          <div class="campaign-details-item w-full lg:w-4/5 mx-auto">
            <?php if ($cmp_detail) : ?>
              <h1 class="text-[26px] md:text-[36px] font-bold leading-tight text-center text-[#0167bc]"><?= clean_string($cmp_detail['campaign_title']); ?></h1>
              <div class="campaign-description text-center leading-none"><?= $cmp_detail['campaign_description']; ?></div>
            <?php endif; ?>
          </div>
        </div>
        <div class="tab-buttons w-full relative">
          <div class="w-full lg:w-4/5 mx-auto flex justify-center gap-3 px-2 md:px-4 py-5 flex-wrap">
            <?php foreach (get_field('project_selector_tabs', get_the_ID()) as $index => $tab) : ?>
              <button class="tab-button group flex items-center justify-center gap-2 transition-all duration-300 leading-none <?php echo $index === 0 ? 'active' : ''; ?>" data-tab="tab-<?php echo $index; ?>">
                <div class="w-[20px] md:w-7 h-[20px] md:h-7 shrink-0">
                  <svg class="block group-[.active]:hidden" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g id="Complete"> <g id="Circle"> <circle cx="12" cy="12" data-name="Circle" fill="none" id="Circle-2" r="10" stroke="#eee" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle> </g> </g> </g></svg>

                  <svg class="hidden group-[.active]:block" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z" fill="#fff"></path> </g></svg>
                </div>
                <h4 class="text-xl md:text-2xl font-medium leading-none"><?= clean_string($tab['tab_label']); ?></h4>
              </button>
            <?php endforeach; ?>
          </div>
          <div style="background-image: url('https://assetwise.co.th/wp-content/uploads/2025/09/arrow-pane-white.png');" class="w-full absolute -bottom-[60px] h-[60px] left-0 bg-center bg-no-repeat bg-cover">
        </div>
      </div>
      
      <div class="tab-content w-full bg-blue-50 pt-[90px] pb-10 px-4 md:px-0">
        <div class="w-full lg:w-4/5 mx-auto">
          <?php foreach (get_field('project_selector_tabs', get_the_ID()) as $index => $tab) : ?>
            <div class="tab-pane bg-transparent <?php echo $index === 0 ? 'active' : 'hidden'; ?>" id="tab-<?php echo $index; ?>">
              <div class="flex flex-col gap-4">
                <?php if ($tab['tab_label'] != '') : ?>
                  <h3 class="text-4xl text-center font-medium mb-2 text-neutral-800"><?= clean_string($tab['tab_label']); ?></h3>
                <?php endif; ?>
                <?php foreach ($tab['projects_group'] as $group) : ?>
                  <div class="tab-group-wrapper">
                    <?php if ($group['group_label'] != '') : ?>
                      <p class="text-neutral-800 font-medium text-[26px] mb-4"><?= clean_string($group['group_label']); ?></p>
                    <?php endif; ?>
                    <div class="projects-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-5">
                      <?php foreach ($group['projects'] as $project) : ?>
                        <?php
                          $pid = $project['project'];
                          $cis_id = get_field('project_id', $project['project']);
                          $status = get_the_terms($project['project'], 'project_status');
                          $status_key = $status[0]->slug;
                          $status_label = $status[0]->name;
                          ?>
                        <div class="project-item cursor-pointer bg-white text-neutral-800 shadow rounded flex md:flex-col" data-project-id="<?= $cis_id; ?>">
                          <div class="project_thumbnail aspect-[3/4] w-[200px] md:w-full bg-cover shrink-0 relative" style="background-image:url('<?= get_the_post_thumbnail_url($project['project'], 'full'); ?>');">
                            <div class="project_status-badge absolute top-2 -left-2 px-3 py-1 status-<?= $status_key; ?> text-white font-medium text-2xl"><?= $status_label; ?></div>
                          </div>
                          <div class="project_detail p-4 flex flex-col md:flex-row md:justify-between gap-5 md:gap-2">
                            <div>
                              <img src="<?= get_field('logo', $pid)['url']; ?>" alt="<?= get_the_title($pid); ?>" class="h-11 ml-0 mb-2">
                              <h4 class="text-2xl text-neutral-800 leading-none font-medium"><?= get_field('project_name_th', $pid) == '' ? get_the_title($pid) : get_field('project_name_th', $pid); ?></h4>
                              <p class="text-neutral-500">เริ่มต้น <?= $project['price']; ?><span class="text-red-500">*</span></p>
                            </div>
                            <div class="flex items-center justify-start md:justify-center">
                              <div class="peoject-select-toggler flex items-center justify-center">
                                <svg class="project-checkbox w-[40px] h-[40px] transition-all duration-300" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <rect x="2" y="2" width="20" height="20" rx="1" stroke="#ccc" stroke-width="1" fill="none" class="checkbox-border"/>
                                  <path d="M7 12L10 15L17 8" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="checkmark">
                                </svg>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabPanes = document.querySelectorAll('.tab-pane');

        const projectBoxes = document.querySelectorAll('.project-item');
        const registerSection = document.getElementById('register_section');

        function removeCheckedClass() {
          projectBoxes.forEach(box => {
            box.classList.remove('checked');
          });
        }

        projectBoxes.forEach(box => {
          box.addEventListener('click', function() {
            removeCheckedClass();
            this.classList.toggle('checked');
            //console.log(this.dataset.projectId);

            const projectName = this.querySelector('.project_detail h4').textContent;
            document.getElementById('project_name').textContent = projectName;
            document.getElementById('project_id').value = this.dataset.projectId;
            
            const rect = registerSection.getBoundingClientRect();
            const targetPosition = window.pageYOffset + rect.top - 70;
            window.scrollTo({ top: targetPosition, behavior: 'smooth' });
          });
        });

        tabButtons.forEach(button => {
          button.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');

            // Remove active class from all buttons and panes
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabPanes.forEach(pane => pane.classList.add('hidden'));
            tabPanes.forEach(pane => pane.classList.remove('active'));

            // Add active class to clicked button
            this.classList.add('active');

            // Show corresponding tab pane
            const targetPane = document.getElementById(targetTab);
            if (targetPane) {
              targetPane.classList.remove('hidden');
              targetPane.classList.add('active');
            }
          });
        });
      });
    </script>
<?php endif; ?>

<section id="register_section" class="py-10">
  <div class="container mx-auto px-4 md:px-0">
    <div class="w-full lg:w-4/5 mx-auto">
      <h2 class="text-5xl text-center font-medium mb-2 text-white">ลงทะเบียน <span id="project_name"></span></h2>
      <form id="register_form" class="max-w-2xl mx-auto mt-8 space-y-6">
        <input type="hidden" id="project_id" name="project_id" value="">
        <input type="hidden" id="utm_source" name="utm_source" value="<?= isset($_GET['utm_source']) ? $_GET['utm_source'] : ''; ?>">
        <input type="hidden" id="utm_medium" name="utm_medium" value="<?= isset($_GET['utm_medium']) ? $_GET['utm_medium'] : ''; ?>">
        <input type="hidden" id="utm_campaign" name="utm_campaign" value="<?= isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : ''; ?>">
        <input type="hidden" id="utm_term" name="utm_term" value="<?= isset($_GET['utm_term']) ? $_GET['utm_term'] : ''; ?>">
        <input type="hidden" id="utm_id" name="utm_id" value="<?= isset($_GET['utm_id']) ? $_GET['utm_id'] : ''; ?>">
        <input type="hidden" id="utm_content" name="utm_content" value="<?= isset($_GET['utm_content']) ? $_GET['utm_content'] : ''; ?>">
        <input type="hidden" id="refid" name="refid" value="<?= get_the_ID(); ?>">

        <?php if  ($cmp_detail['campaign_key']) : ?>
          <input type="hidden" id="campaign_key" name="campaign_key" value="<?= $cmp_detail['campaign_key']; ?>">
        <?php endif; ?>

        <input type="hidden" id="thankyou_image" name="thankyou_image" value="<?= get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" readonly>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
          <div>
            <label for="fname" class="block font-medium text-gray-700 mb-2">ชื่อ *</label>
            <input type="text" id="fname" name="fname" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
          </div>
          <div>
            <label for="lname" class="block font-medium text-gray-700 mb-2">นามสกุล *</label>
            <input type="text" id="lname" name="lname" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
          </div>
        
          <div>
            <label for="tel" class="block font-medium text-gray-700 mb-2">เบอร์โทรศัพท์ *</label>
            <input type="tel" id="tel" name="tel" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" pattern="[0-9]*">
          </div>
        
          <div>
            <label for="email" class="block font-medium text-gray-700 mb-2">อีเมล *</label>
            <input type="email" id="email" name="email" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
          </div>
        </div>
        <div>
          <label for="contact_time" class="block font-medium text-gray-700 mb-2">เวลาที่สะดวกให้ติดต่อกลับ</label>
          <select id="contact_time" name="contact_time" class="w-full px-3 h-[42px] border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <option value="">เลือกช่วงเวลา</option>
            <option value="09:00 - 12:00">09:00 - 12:00 น.</option>
            <option value="12:00 - 13:00">12:00 - 13:00 น.</option>
            <option value="13:00 - 16:00">13:00 - 16:00 น.</option>
            <option value="16:00 - 18:00">16:00 - 18:00 น.</option>
          </select>
        </div>
        
        <div class="flex items-start space-x-3">
          <input type="checkbox" id="consent" name="consent" required class="mt-1 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
          <label for="consent" class="text-gray-700 leading-none text-[16px] md:text-[18px]">บริษัทฯ จะจัดเก็บข้อมูลของท่าน เพื่อการติดต่อแจ้งข้อมูลข่าวสารที่เกี่ยวข้องกับ ผลิตภัณฑ์ บริการของบริษัทฯ และนำเสนอโครงการที่น่าสนใจ คลิกที่นี่เพื่อดู <a class="text-white underline hover:text-gray-200" href="<?= isset($settings['terms_conditions']) ? $settings['terms_conditions'] : ''; ?>" title="ข้อตกลงและเงื่อนไข" target="_blank">ข้อตกลงและเงื่อนไข</a> และ <a href="https://assetwise.co.th/privacy-policy/" class="text-white underline hover:text-gray-200" target="_blank">นโยบายความเป็นส่วนตัว</a></label>
        </div>
        <div class="text-center">
          <button id="submit_btn" type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-8 rounded-md transition duration-300 ease-in-out transform hover:scale-105 flex items-center justify-center mx-auto gap-2">
            <svg id="loading_spinner" class="animate-spin -ml-1 h-5 w-5 text-white hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            ลงทะเบียน
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const submitBtn = document.querySelector('#submit_btn');
    const loadingSpinner = document.querySelector('#loading_spinner');
    
    // Validation function to check all required fields
    function validateRequiredFields() {
      const errors = {};
      
      // Check fname
      const fname = document.getElementById('fname')?.value.trim();
      if (!fname) {
        errors.fname = 'กรุณากรอกชื่อ';
      }
      
      // Check lname
      const lname = document.getElementById('lname')?.value.trim();
      if (!lname) {
        errors.lname = 'กรุณากรอกนามสกุล';
      }
      
      // Check tel
      const tel = document.getElementById('tel')?.value.trim();
      const telRegex = /^[0-9]*$/;
      if (!telRegex.test(tel)) {
        errors.tel = 'กรุณากรอกเบอร์โทรศัพท์ให้ถูกต้อง';
      }
      if (!tel) {
        errors.tel = 'กรุณากรอกเบอร์โทรศัพท์';
      }
      
      // Check email
      const email = document.getElementById('email')?.value.trim();
      const emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
      if (!email) {
        errors.email = 'กรุณากรอกอีเมล';
      }
      if (!emailRegex.test(email)) {
        errors.email = 'กรุณากรอกอีเมลให้ถูกต้อง';
      }
      
      // Check consent checkbox
      const consent = document.getElementById('consent')?.checked;
      if (!consent) {
        errors.consent = 'กรุณายอมรับข้อตกลงและเงื่อนไข';
      }
      
      return {
        isValid: Object.keys(errors).length === 0,
        errors: errors
      };
    }
    
    // Function to display error message for a field
    function showFieldError(fieldId, message) {
      const field = document.getElementById(fieldId);
      if (!field) return;
      
      // Add error class to field
      field.classList.add('error');
      
      // Remove existing error message if any
      removeFieldError(fieldId);
      
      // Create error message element
      const errorElement = document.createElement('span');
      errorElement.className = 'field-error';
      errorElement.id = fieldId + '_error';
      errorElement.textContent = message;
      
      // Insert error message after the field
      if (fieldId === 'consent') {
        // For checkbox, insert after the flex container
        const container = field.closest('.flex.items-start');
        if (container && container.parentNode) {
          container.parentNode.insertBefore(errorElement, container.nextSibling);
        }
      } else {
        // For other fields, insert after the field
        field.parentNode.appendChild(errorElement);
      }
    }
    
    // Function to remove error message for a field
    function removeFieldError(fieldId) {
      const field = document.getElementById(fieldId);
      if (!field) return;
      
      // Remove error class from field
      field.classList.remove('error');
      
      // Remove error message element
      const errorElement = document.getElementById(fieldId + '_error');
      if (errorElement) {
        errorElement.remove();
      }
    }
    
    // Function to clear all errors
    function clearAllErrors() {
      const requiredFields = ['fname', 'lname', 'tel', 'email', 'consent'];
      requiredFields.forEach(fieldId => {
        removeFieldError(fieldId);
      });
    }
    
    submitBtn.addEventListener('click', function(e) {
      e.preventDefault();
      
      // Clear previous errors
      clearAllErrors();
      
      // Validate required fields
      const validation = validateRequiredFields();
      if (!validation.isValid) {
        // Display errors for all invalid fields
        Object.keys(validation.errors).forEach(fieldId => {
          showFieldError(fieldId, validation.errors[fieldId]);
        });
        // Scroll to first error field
        const firstErrorField = document.getElementById(Object.keys(validation.errors)[0]);
        if (firstErrorField) {
          firstErrorField.scrollIntoView({ behavior: 'smooth', block: 'center' });
          firstErrorField.focus();
        }
        return;
      }
      
      // Check project selection
      const projectId = document.getElementById('project_id').value;
      if (projectId == '') {
        alert('กรุณาเลือกโครงการ');
        return;
      }
      
      submitBtn.classList.add('disabled');
      loadingSpinner.classList.remove('hidden');
      // Collect form values with validation
      const contactTime = document.getElementById('contact_time')?.value || '';
      const contactTimeParts = contactTime.split(' ');
      
      const formData = {
        ProjectID: Number(document.getElementById('project_id')?.value || 0),
        ContactChannelID: 21,
        ContactTypeID: 35,
        FollowUpID: 42,
        RefID: Number(document.getElementById('refid')?.value || 0),
        Ref: document.getElementById('project_name')?.textContent || '',
        RefDate: new Date().toISOString(),
        Fname: document.getElementById('fname')?.value || '',
        Lname: document.getElementById('lname')?.value || '',
        Tel: document.getElementById('tel')?.value || '',
        Email: document.getElementById('email')?.value || '',
        AppointTime: contactTimeParts[0] || '',
        AppointTimeEnd: contactTimeParts[2] || '',
        FlagPersonalAccept: true,
        FlagContactAccept: true,
        utm_source: document.getElementById('utm_source')?.value || '',
        utm_medium: document.getElementById('utm_medium')?.value || '',
        utm_campaign: document.getElementById('utm_campaign')?.value+'_'+document.getElementById('campaign_key')?.value || '',
        utm_term: document.getElementById('utm_term')?.value || '',
        utm_id: document.getElementById('utm_id')?.value || '',
        utm_content: document.getElementById('utm_content')?.value || '',
        thankyou_image: document.getElementById('thankyou_image')?.value || '',
        campaign_key: document.getElementById('campaign_key')?.value || ''
      };

      // Send data to API
      fetch('https://node.assetwise.dev/webhook/cmp-register', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData)
      })
      .then(response => response.json())
      .then(response => {
        console.log(response);
        if (response) {
          // Send to webhook with proper error handling
          fetch('https://node.assetwise.dev/webhook/asw-log-sheet', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData)
          })
          .then(webhookResponse => {
            if (!webhookResponse.ok) {
              console.warn('Webhook failed:', webhookResponse.status);
            }
            return webhookResponse;
          })
          .then(() => {
            document.querySelector('form')?.reset();
            // Redirect to thank you page
            const currentPath = window.location.pathname;
            const thankYouPath = currentPath + (currentPath.endsWith('/') ? '' : '/') + 'thank-you/';
            window.location.href = thankYouPath;
          })
          .catch(webhookError => {
            console.error('Webhook error:', webhookError);
            // Still proceed with redirect even if webhook fails
            document.querySelector('form')?.reset();
            const currentPath = window.location.pathname;
            const thankYouPath = currentPath + (currentPath.endsWith('/') ? '' : '/') + 'thank-you/';
            window.location.href = thankYouPath;
          });
        } else {
          alert('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง');
          submitBtn.classList.remove('disabled');
          loadingSpinner.classList.add('hidden');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('เกิดข้อผิดพลาดในการเชื่อมต่อ กรุณาลองใหม่อีกครั้ง');
        submitBtn.classList.remove('disabled');
        loadingSpinner.classList.add('hidden');
      });
      
    });
    
    // Real-time validation: clear errors when user interacts with fields
    const requiredFields = ['fname', 'lname', 'tel', 'email'];
    requiredFields.forEach(fieldId => {
      const field = document.getElementById(fieldId);
      if (field) {
        field.addEventListener('input', function() {
          if (this.value.trim()) {
            removeFieldError(fieldId);
          }
        });
        field.addEventListener('blur', function() {
          if (!this.value.trim()) {
            showFieldError(fieldId, fieldId === 'fname' ? 'กรุณากรอกชื่อ' : 
                                    fieldId === 'lname' ? 'กรุณากรอกนามสกุล' :
                                    fieldId === 'tel' ? 'กรุณากรอกเบอร์โทรศัพท์' :
                                    'กรุณากรอกอีเมล');
          }
        });
      }
    });
    
    // Handle consent checkbox
    const consentField = document.getElementById('consent');
    if (consentField) {
      consentField.addEventListener('change', function() {
        if (this.checked) {
          removeFieldError('consent');
        }
      });
    }
  });
</script>

<?php get_footer() ?>