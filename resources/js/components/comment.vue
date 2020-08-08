<template>
  <div class="post_dtls_cmnt_sec mar_t20">
    <h2 class="post_dtls_title2 pad_b20">Comments (2)</h2>
    <!-- comment -->
    <div class="cmnt_box_all">
      <div class="cmnt_box_top dis_flx">
        <div class="cmnt_box_top_left d-flex">
          <div class="cmnt_img mar_r15">
            <img src="/images/user.png" alt="image" />
          </div>
          <div class="cmnnt_name">
            <div class="cmnt_name_left">
              <h4 class="tchr_nam mar_b10">james smith</h4>
            </div>
            <div class="cmnt_name_right">
              <p class="cmnt_name_right_p">05 Nov 2019 AT 12:00 AM</p>
            </div>
          </div>
        </div>
      </div>

      <div class="cmnnt_p pad_t10">
        <p>I recently completed another course from the 365 team "Data Science Boot Camp" where I was able to review my college course work taken many years ago in statistics along with an overview of programming languages (Python) I use regularly.</p>
        <p class="post_reply mar_t5">Reply</p>
      </div>
    </div>
    <!-- comment -->

    <!-- reply -->
    <div class="cmnt_box_all reply_sec">
      <div class="cmnt_box_top dis_flx">
        <div class="cmnt_box_top_left d-flex">
          <div class="cmnt_img mar_r15">
            <img src="/images/user.png" alt="image" />
          </div>
          <div class="cmnnt_name">
            <div class="cmnt_name_left dis_fx_cntr">
              <h4 class="tchr_nam mar_b10">Liam Dawson</h4>
            </div>
            <div class="cmnt_name_right">
              <p class="cmnt_name_right_p">06 Nov 2019 AT 11:23 PM</p>
            </div>
          </div>
        </div>
      </div>

      <div class="cmnnt_p pad_t10">
        <p>Great course. Excellent introduction. Pretty fast paced. And while I was new to the field I had to do some exploration next to the explanations provided within the course.</p>
        <p class="post_reply mar_t5">Reply</p>
      </div>
    </div>
    <div class="cmnt_box_all reply_sec">
      <div class="cmnt_box_top d-flex">
        <div class="cmnt_box_top_left d-flex">
          <div class="cmnt_img mar_r15">
            <img src="/images/user.png" alt="image" />
          </div>
          <div class="cmnnt_name">
            <div class="cmnt_name_left dis_fx_cntr">
              <h4 class="tchr_nam mar_b10">Jake Ball</h4>
              <div class="cmnt_name_left_rating"></div>
            </div>
            <div class="cmnt_name_right">
              <p class="cmnt_name_right_p">07 Nov 2019 AT 05:23 AM</p>
            </div>
          </div>
        </div>
      </div>

      <div class="cmnnt_p pad_t10">
        <p>Great to understand the mechanics, mathematics and also statistics in back of BI. I really liked it, and the exercises are great to confirm the knowledge.</p>
        <p class="post_reply mar_t5">Reply</p>
      </div>
    </div>
    <!-- reply -->

    <!-- comment -->
    <div class="cmnt_box_all">
      <div class="cmnt_box_top dis_flx">
        <div class="cmnt_box_top_left d-flex">
          <div class="cmnt_img mar_r15">
            <img src="/images/user.png" alt="image" />
          </div>
          <div class="cmnnt_name">
            <div class="cmnt_name_left">
              <h4 class="tchr_nam mar_b10">Olly Stone</h4>
            </div>
            <div class="cmnt_name_right">
              <p class="cmnt_name_right_p">11 Nov 2019 AT 09:12 AM</p>
            </div>
          </div>
        </div>
      </div>

      <div class="cmnnt_p pad_t10">
        <p>It was a decent match, I hate to say this because it was already very long but honestly it probably should have been 1 - 3 hours longer to include more explanations of SQL/MySQL, Python and Tableau.</p>
        <p class="post_reply mar_t5">Reply</p>
      </div>
    </div>
    <!-- comment -->

    <!-- iteam -->
    <div class="cmnt_box_all reply_sec">
      <div class="cmnt_box_top dis_flx">
        <div class="cmnt_box_top_left d-flex">
          <div class="cmnt_img mar_r15">
            <img src="/images/user.png" alt="image" />
          </div>
          <div class="cmnnt_name">
            <div class="cmnt_name_left">
              <h4 class="tchr_nam mar_b10">Jofra Archer</h4>
            </div>
            <div class="cmnt_name_right">
              <p class="cmnt_name_right_p">11 Dec 2019 AT 07:45 AM</p>
            </div>
          </div>
        </div>
      </div>

      <div class="cmnnt_p pad_t10">
        <p>I am on 50% of the course. So far I am very happy about the course. very succinct, practical and straight to the point. I am looking forward to complete this course so I can move onto data science</p>
        <p class="post_reply mar_t5">Reply</p>
      </div>
    </div>
    <!-- iteam -->
  </div>
</template>
<script>
export default {
    data(){
        return{
            comments:'',
        }
    },
    async created(){
        const res = this.callApi('get','https://jsonplaceholder.typicode.com/todos/1')
        if(res.status == 200){
            console.log(res.data)
        }
    }
}
</script>