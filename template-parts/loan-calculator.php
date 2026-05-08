<style>
  @media (min-width: 768px) {
    #loan_calc_section {
      background-image: url('https://assetwise.co.th/wp-content/uploads/2025/05/loanc-bg-01-tiny.webp');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    #calc_tabs #tab_contents .grid {
      background: rgba(255, 255, 255, 0.6);
      backdrop-filter: blur(6px);
      border-radius: 2px;
    }
  }

  @media (max-width: 767px) {
    #loan_calc_section {
      background-image: url('https://assetwise.co.th/wp-content/uploads/2025/05/loanc-bg-01-tiny.webp');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }
  }

  #calc_tabs .tab-group .tab-item.active {
    background: none;
    color: #124375;
  }
  
  #calc_tabs #tab_contents .tab-content {
    display: none;
    color: #262626;
  }
  #calc_tabs #tab_contents .tab-content.active {
    background: none;
    display: block;
  }
  #calc_tabs #tab_contents .input-group input::-webkit-outer-spin-button,
  #calc_tabs #tab_contents .input-group input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  #calc_tabs #tab_contents .input-group input {
    background-color: transparent;
  }

  #calc_tabs #tab_contents .input-group input[type=number] {
    -moz-appearance: textfield;
  }
</style>

<div id="loan_calc_section" class="py-12">
  <div class="cont-pd">
    <div class="flex flex-col items-center w-full">
      <h2 class="text-4xl font-medium lg:text-5xl mx-auto text-[#124375] mb-4 lg:mb-10"><?php pll_e('โปรแกรมคำนวณสินเชื่อ') ?></h2>
      <div id="calc_tabs" class="w-full lg:w-3/5 mx-auto">
        <div class="tab-group flex lg:flex-wrap justify-center gap-2 lg:gap-4 border-b border-neutral-200">
          <div class="tab-item active group" data-tab="1">
              <button class="lg:text-3xl text-neutral-500 font-medium px-2 lg:px-4 py-1 border-b-4 border-transparent hover:border-[#124375] hover:text-[#124375] group-[.active]:border-[#124375] group-[.active]:text-[#124375] transition-all duration-300"><?php pll_e('ความสามารถในการกู้')?></button>
          </div>
          <div class="tab-item group" data-tab="2">
              <button class="lg:text-3xl text-neutral-500 font-medium px-2 lg:px-4 py-1 border-b-4 border-transparent hover:border-[#124375] hover:text-[#124375] group-[.active]:border-[#124375] group-[.active]:text-[#124375] transition-all duration-300"><?php pll_e('ยอดผ่อนต่อเดือน')?></button>
          </div>
        </div>
        <div id="tab_contents" class="w-full py-4 lg:py-10">

          <!-- Tab 1 :: Loan Calculator -->
          <div class="tab-content active" data-tab="1">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
              <!-- Left Column - Form -->
              <div class="lg:p-6 order-2 lg:order-1">
                <form id="loanCalculatorForm" class="flex flex-col gap-4">
                  <div class="flex flex-col gap-2">
                    <label for="net_income" class="text-2xl mb-0 text-neutral-700"><?php pll_e('รายได้ต่อเดือน (รวมรายได้ผู้กู้ร่วม (ถ้ามี))')?></label>
                    <div class="input-group relative">
                      <input type="text" id="net_income" name="net_income" pattern="\d*" class="!w-full border-t-0 border-x-0 border-b border-neutral-300 pl-2 pr-10 py-2 text-3xl focus:outline-none focus:border-[#124375] leading-none" value="25,000" required>
                      <span class="text-neutral-500 absolute right-0 top-0 bottom-0 flex items-center"><?php pll_e('บาท')?></span>
                    </div>
                  </div>

                  <div class="flex flex-col gap-2">
                    <label for="net_debt" class="text-2xl text-neutral-700"><?php pll_e('ภาระหนี้ที่ต้องผ่อนชำระต่อเดือน (ถ้ามี)')?></label>
                    <div class="input-group relative">  
                      <input type="text" id="net_debt" pattern="\d*" name="net_debt" class="!w-full border-t-0 border-x-0 border-b border-neutral-300 pl-2 pr-10 py-2 text-3xl focus:outline-none focus:border-[#124375] leading-none" value="8,000" required>
                      <span class="text-neutral-500 absolute right-0 top-0 bottom-0 flex items-center"><?php pll_e('บาท')?></span>
                    </div>
                  </div>

                  <div class="flex flex-col gap-2">
                    <label for="period" class="text-2xl text-neutral-700"><?php pll_e('ระยะเวลาที่ขอกู้ (ปี)')?></label>
                    <div class="input-group relative">
                      <input type="number" id="period" name="period" min="1" max="30" class="!w-full border-t-0 border-x-0 border-b border-neutral-300 pl-2 pr-10 py-2 text-3xl focus:outline-none focus:border-[#124375] leading-none" value="30" max="30" required>
                      <span class="text-neutral-500 absolute right-0 top-0 bottom-0 flex items-center"><?php pll_e('ปี')?></span>
                    </div>
                  </div>

                  <div class="flex gap-4 mt-4">
                    <button type="button" id="calculateBtn" onclick="calculateLoan()" class="flex-1 px-6 py-2 bg-[#124375] text-white font-medium text-2xl md:text-3xl hover:bg-[#0e345d] transition-all duration-300">
                      <?php pll_e('คำนวณ')?>
                    </button>
                    <button type="button" onclick="clearForm()" class="flex-1 px-6 py-2 bg-neutral-100 text-neutral-700 text-2xl md:text-3xl font-light hover:bg-neutral-200 transition-all duration-300">
                      <?php pll_e('ล้างข้อมูล')?>
                    </button>
                  </div>
                </form>
              </div>

              <!-- Right Column - Results -->
              <div class="bg-[#124375] order-1 lg:order-2 p-4 lg:p-6 shadow-[7px_7px_0_rgba(0,0,0,0.5)] lg:shadow-[10px_10px_0px_rgba(0,0,0,0.5)] flex flex-col gap-2 justify-center mb-4 lg:mb-0">
                <h3 class="text-2xl font-medium text-neutral-300 text-center"><?php pll_e('คำนวณวงเงินที่สามารถกู้ได้')?></h3>
                <div id="calculationResults" class="flex flex-col gap-4">
                  <h3 class="text-white text-7xl text-center font-medium animate__animated flex justify-center items-baseline gap-2 leading-[0.7]">
                    <span id="loan_result" data-target="3,300,000">3,300,000</span>
                    <span class="text-white text-center text-[20px]"><?php pll_e('บาท*')?></span>
                  </h3>
                  <p class="text-neutral-100 text-center text-[16px] font-light lg:block">*<?php pll_e('การคำนวณนี้เป็นการประมาณการยอดเงินกู้ได้สูงสุดเพื่อที่อยู่อาศัย<br/>
                  ซึ่งขึ้นอยู่กับรายได้ต่อปีของคุณและความสามารถในการบริการสินเชื่อ')?></p>
                  <div class="flex flex-col gap-2">
                    <p class="text-neutral-100 text-center lg:block"><?php pll_e('อยากรู้เพิ่มเติม?')?></p>
                    <a href="https://loanverify-asw.up.railway.app/chatbot.html" target="_blank" class="bg-white text-primary text-center text-[24px] font-medium w-fit mx-auto px-7 py-2 rounded-full leading-none flex items-center gap-2">
                      <div class="ai-star w-6 h-6">
                        <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86.59 83.49">
                          <g id="Layer_1-2" data-name="Layer 1">
                            <g>
                              <path d="M66.26,48.53l-15.81-6.9c-3.82-1.67-6.87-4.72-8.54-8.54l-6.9-15.81c-.54-1.23-2.27-1.23-2.81,0l-6.9,15.81c-1.67,3.82-4.72,6.87-8.54,8.54L.92,48.54c-1.22.53-1.23,2.27,0,2.81l16.11,7.12c3.81,1.69,6.85,4.75,8.5,8.58l6.68,15.51c.53,1.23,2.28,1.24,2.81,0l6.89-15.79c1.67-3.82,4.72-6.87,8.54-8.54l15.81-6.9c1.23-.54,1.23-2.27,0-2.81h0Z"/>
                              <path d="M86.05,18.59l-9.14-3.99c-2.21-.96-3.97-2.73-4.93-4.93l-3.99-9.14c-.31-.71-1.31-.71-1.62,0l-3.99,9.14c-.96,2.21-2.73,3.97-4.93,4.93l-9.15,3.99c-.71.31-.71,1.31,0,1.62l9.31,4.12c2.2.97,3.96,2.75,4.91,4.96l3.86,8.96c.31.71,1.32.71,1.63,0l3.98-9.12c.96-2.21,2.73-3.97,4.93-4.93l9.14-3.99c.71-.31.71-1.31,0-1.62h0Z"/>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <?php pll_e('คุยกับ AI')?>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Tab 2 :: Monthly Payment Calculator test -->
          <div class="tab-content" data-tab="2">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
              <!-- Left Column - Form -->
              <div class="lg:p-6 order-2 lg:order-1">
                <form id="loanCalculatorForm" class="flex flex-col gap-4">
                  <div class="flex flex-col gap-2">
                    <label for="net_loan" class="text-2xl mb-0 text-neutral-700"><?php pll_e('จำนวนเงินที่ขอกู้')?></label>
                    <div class="input-group relative">
                      <input type="text" id="net_loan" name="net_loan" pattern="\d*" class="!w-full border-t-0 border-x-0 border-b border-neutral-300 pl-2 pr-10 py-2 text-3xl focus:outline-none focus:border-[#124375] leading-none" value="2,000,000" required>
                      <span class="text-neutral-500 absolute right-0 top-0 bottom-0 flex items-center"><?php pll_e('บาท')?></span>
                    </div>
                  </div>

                  <div class="flex flex-col gap-2">
                    <label for="net_debt" class="text-2xl text-neutral-700"><?php pll_e('อัตราดอกเบี้ยต่อปี')?></label>
                    <div class="input-group relative">  
                      <input type="text" id="interest_rate" name="interest_rate" pattern="^\d*\.?\d*$" class="!w-full border-t-0 border-x-0 border-b border-neutral-300 pl-2 pr-10 py-2 text-3xl focus:outline-none focus:border-[#124375] leading-none" value="5.4" required>
                      <span class="text-neutral-500 absolute right-0 top-0 bottom-0 flex items-center"><?php pll_e('%')?></span>
                    </div>
                  </div>

                  <div class="flex flex-col gap-2">
                    <label for="dept_period" class="text-2xl text-neutral-700"><?php pll_e('ระยะเวลาที่ขอกู้ (ปี)')?></label>
                    <div class="input-group relative">
                      <input type="number" id="dept_period" name="dept_period" min="1" max="30" class="!w-full border-t-0 border-x-0 border-b border-neutral-300 pl-2 pr-10 py-2 text-3xl focus:outline-none focus:border-[#124375] leading-none" value="30" max="30" required>
                      <span class="text-neutral-500 absolute right-0 top-0 bottom-0 flex items-center"><?php pll_e('ปี')?></span>
                    </div>
                  </div>

                  <div class="flex gap-4 mt-4">
                    <button type="button" id="calculateBtn" onclick="calculateDept()" class="flex-1 px-6 py-2 bg-[#124375] text-white font-medium text-2xl md:text-3xl hover:bg-[#0e345d] transition-all duration-300">
                      <?php pll_e('คำนวณ')?>
                    </button>
                    <button type="button" onclick="clearForm()" class="flex-1 px-6 py-2 bg-neutral-100 text-neutral-700 text-2xl md:text-3xl font-light hover:bg-neutral-200 transition-all duration-300">
                      <?php pll_e('ล้างข้อมูล')?>
                    </button>
                  </div>
                </form>
              </div>

              <!-- Right Column - Results -->
              <div class="bg-[#124375] order-1 lg:order-2 p-4 lg:p-6 shadow-[7px_7px_0_rgba(0,0,0,0.5)] lg:shadow-[10px_10px_0px_rgba(0,0,0,0.5)] flex flex-col gap-2 justify-center mb-4 lg:mb-0">
                <h3 class="text-2xl font-medium text-neutral-300 text-center"><?php pll_e('ประมาณเงินผ่อนต่อเดือน')?></h3>
                <div id="calculationDeptResults" class="flex flex-col gap-4">
                  <h3 class="text-white text-7xl text-center font-medium animate__animated flex justify-center items-baseline gap-2 leading-[0.7]">
                    <span id="dept_result" data-target="20,000">20,000</span>
                    <span class="text-white text-center text-[20px]"><?php pll_e('บาท*')?></span>
                  </h3>
                  <p class="text-neutral-100 text-center text-[16px] font-light lg:block">*<?php pll_e('ผลการคำนวณข้างต้นเป็นเพียงการคำนวณเบื้องต้นเท่านั้น
                  อาจมีการเปลี่ยนแปลงได้ ภายใต้หลักเกณฑ์และเงื่อนไขของธนาคาร')?></p>
                </div>
                <div class="flex flex-col gap-2">
                  <p class="text-neutral-100 text-center lg:block"><?php pll_e('อยากรู้เพิ่มเติม?')?></p>
                  <a href="https://loanverify-asw.up.railway.app/chatbot.html" target="_blank" class="bg-white text-primary text-center text-[24px] font-medium w-fit mx-auto px-7 py-2 rounded-full leading-none flex items-center gap-2">
                    <div class="ai-star w-6 h-6">
                      <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86.59 83.49">
                        <g id="Layer_1-2" data-name="Layer 1">
                          <g>
                            <path d="M66.26,48.53l-15.81-6.9c-3.82-1.67-6.87-4.72-8.54-8.54l-6.9-15.81c-.54-1.23-2.27-1.23-2.81,0l-6.9,15.81c-1.67,3.82-4.72,6.87-8.54,8.54L.92,48.54c-1.22.53-1.23,2.27,0,2.81l16.11,7.12c3.81,1.69,6.85,4.75,8.5,8.58l6.68,15.51c.53,1.23,2.28,1.24,2.81,0l6.89-15.79c1.67-3.82,4.72-6.87,8.54-8.54l15.81-6.9c1.23-.54,1.23-2.27,0-2.81h0Z"/>
                            <path d="M86.05,18.59l-9.14-3.99c-2.21-.96-3.97-2.73-4.93-4.93l-3.99-9.14c-.31-.71-1.31-.71-1.62,0l-3.99,9.14c-.96,2.21-2.73,3.97-4.93,4.93l-9.15,3.99c-.71.31-.71,1.31,0,1.62l9.31,4.12c2.2.97,3.96,2.75,4.91,4.96l3.86,8.96c.31.71,1.32.71,1.63,0l3.98-9.12c.96-2.21,2.73-3.97,4.93-4.93l9.14-3.99c.71-.31.71-1.31,0-1.62h0Z"/>
                          </g>
                        </g>
                      </svg>
                    </div>
                    <?php pll_e('คุยกับ AI')?>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function formatNumber(nStr) {
    let value = nStr.toString().replace(/,/g, '');
    let formattedValue = value.replace(/^0+/, '').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return formattedValue;
  }

  function calculateLoan() {
    const netIncome = document.getElementById('net_income').value;
    const netDebt = document.getElementById('net_debt').value;
    const loanAmount = (Number(netIncome.replace(/,/g, '')) - Number(netDebt.replace(/,/g, ''))) * 150;
    const loanResult = document.querySelector('#loan_result');

    if (!isNaN(loanAmount)) {
      loanResult.dataset.target = loanAmount;
      loanResult.textContent = '0';
      startTime = null;
      requestAnimationFrame((timestamp) => animatedDigits(timestamp, '#loan_result'));
    } else {
      console.error("loanAmount is NaN");
      loanResult.textContent = "0";
    }
  }

  function calculateDept() {
    const loanAmount = Number(document.getElementById('net_loan').value.replace(/,/g, ''));
    const interestRate = Number(document.getElementById('interest_rate').value);
    const period = Number(document.getElementById('dept_period').value);

    const monthlyRate = interestRate / 100 / 12;
    const totalMonths = period * 12;

    const x = Math.pow(1 + monthlyRate, totalMonths)
    const monthly = (loanAmount * monthlyRate * x) / (x - 1)

    if (!isNaN(monthly)) {
      const monthDeptResult = document.querySelector('#dept_result');
      monthDeptResult.dataset.target = monthly;
      monthDeptResult.textContent = '0';
      startTime = null;
      requestAnimationFrame((timestamp) => animatedDigits(timestamp, '#dept_result'));
    }
  }

  function clearForm() {
    document.getElementById('loanCalculatorForm').reset();
    document.querySelector('#loan_result').textContent = '0';
    document.querySelector('#dept_result').textContent = '0';
  }

  let startTime = null;

  function animatedDigits(timestamp, target) {
    if (!startTime) startTime = timestamp;
    const displayResult = document.querySelector(target);
    const progress = timestamp - startTime;
    const duration = 800;
    const targetValue = parseInt(displayResult.dataset.target) || 0;
    const percentage = Math.min(progress / duration, 1);
    const currentValue = Math.floor(percentage * targetValue);

    displayResult.textContent = formatNumber(currentValue);

    if (percentage < 1) {
      requestAnimationFrame((timestamp) => animatedDigits(timestamp, target));
    } else {
      displayResult.textContent = formatNumber(targetValue);
      startTime = null;
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
    const tabItems = document.querySelectorAll('#calc_tabs .tab-item');
    const tabContents = document.querySelectorAll('#tab_contents .tab-content');
    const formInput = document.querySelectorAll('#loanCalculatorForm input');

    tabItems.forEach(item => {
      item.addEventListener('click', function() {
        const tab = this.dataset.tab;
        tabContents.forEach(content => {
          if (content.dataset.tab === tab) {
            content.classList.add('active');
          } else {
            content.classList.remove('active');
          }
        });
        tabItems.forEach(item => {
          if (item.dataset.tab === tab) {
            item.classList.add('active');
          } else {
            item.classList.remove('active');
          }
        });
      });
    });

    formInput.forEach(input => {
      input.addEventListener('keyup', function() {
        this.value = formatNumber(this.value);
      });
    });
  });
</script>