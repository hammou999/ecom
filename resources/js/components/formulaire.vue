<template>
    <div class="wrapper">
        <form action="#" @submit.prevent="register">
            <div class="error" v-if="errors" v-text="errors"></div>
            <div class="valid" v-if="valid">لقد تم تسجيل طلبك بنجاح .. سنتصل بك قريباا..</div>
            <div class="roww">
                <div class="coll">
                    <label for="fname">الإسم الكامل:<span class="total_pay">*</span></label>
                </div>
                <div class="coll">
                    <input type="text" id="fname" ref="fname" v-model="fullname" placeholder="الإسم واللقب">
                </div>
            </div>

            <div class="roww">
                <div class="coll">
                    <label for="phone">رقم الهاتف:<span class="total_pay">*</span></label>
                </div>
                <div class="coll">
                    <input type="text" id="phone" ref="phone" v-model="phone"
                           placeholder="يرجى إدخال رقم هاتف صالح">
                </div>
            </div>

            <div class="roww">
                <div class="coll">
                    <label for="adresse">العنوان الكامل:<span class="total_pay">*</span></label>
                </div>
                <div class="coll">
                    <input type="text" id="adresse" ref="adresse" v-model="adresse"
                           placeholder="يرجى إدخال عنوان التوصيل">
                </div>
            </div>
            <div class="coll2">
                <div class="roww1">
                    <div class="coll">
                        <label for="wilaya">الولاية:<span class="total_pay">*</span></label>
                    </div>
                    <div class="coll">
                        <select id="wilaya" ref="wilaya" v-model="wilaya" @change="selectWilaya($event)">
                            <option value="">-- Wilaya --</option>
                            <option v-for="(wilaya, index) in all_wilaya" :value="wilaya.wilaya_code">
                                {{ wilaya.wilaya_code}} {{ wilaya.wilaya_name}} - {{ wilaya.wilaya_name_ascii}}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="roww1">
                    <div class="coll">
                        <label for="commune">البلدية:<span class="total_pay">*</span></label>
                    </div>
                    <div class="coll">
                        <select id="commune" ref="commune" v-model="commune"
                                @change="selectCommune($event.target.selectedIndex)">
                            <option value="">-- Commune --</option>
                            <option v-for="(commune, index) in all_commune" :value="commune.id">
                                {{ commune.commune_name}} - {{ commune.commune_name_ascii}}
                            </option>
                        </select>
                    </div>
                </div>
            </div>


            <br>

            <div class="roww">
                <span class="total_pay">إجمالي التكلفة (مع التوصيل): {{total_pay}},00 دج</span>
            </div>
            <div id="s" ref="s"></div>
            <div class="roww" v-if="submit">
                <input type="submit" value="تأكيد الطلب">
            </div>
            <div class="row1" v-if="!submit">
                <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                <a href="#"><i class="fab fa-whatsapp whatsapp-bg"></i></a>
                <input type="submit" value="إضغط هنا لتقديم طلبك">
            </div>
        </form>
        <div class="body" v-if="load">
            <div class="loader">
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__bar"></div>
                <div class="loader__ball"></div>
            </div>
            <div class="load">
                جري تسجيل طلبك .... يرجى الإنتظار...
            </div>
        </div>
    </div>
</template>

<script>

    export default {

        props: {
            product: Object,
        },
        data() {
            return {
                stickyOptions: {
                    marginTop: 20,
                    forName: 0,
                    className: 'stuck'
                },
                all_wilaya: [],
                all_commune: [],
                errors: "",
                total_pay: parseInt(this.product.prix),
                fullname: "",
                phone: "",
                adresse: "",
                wilaya: "",
                commune: "",
                remarque: "",
                load: false,
                valid: false,
                submit: false,
            };
        },

        watch: {
            errors: function () {
                if (this.errors) {
                    setTimeout(() => this.errors = '', 4000)
                }
            }
        },

        mounted() {
            axios.get("/getWilaya").then(({data}) => {
                this.all_wilaya = data;
            });
            window.addEventListener('scroll', this.handleScroll);
        },

        methods: {
            handleScroll() {
                var el = this.$refs.s;
                var rect = el.getBoundingClientRect();
                var elemTop = rect.top;
                var elemBottom = rect.bottom;

                // Only completely visible elements return true:
                this.submit = (elemTop >= 0) && (elemBottom <= window.innerHeight);
                // Partially visible elements return true:
                //isVisible = elemTop < window.innerHeight && elemBottom >= 0;
            },

            selectWilaya(event) {
                if (event.target.value.length > 0) {
                    axios.get("/getCommune/" + event.target.value).then(({data}) => {
                        this.all_commune = data;
                    });
                }
            },

            selectCommune(selectedIndex) {
                this.total_pay = parseInt(this.product.prix) + parseInt(this.all_commune[selectedIndex].prix);
                console.log(this.all_commune)
            },

            register() {
                if (!/^([^ ]{2,12}[ ]){1,3}[^ ]{2,12}$/.test(this.fullname)) {
                    this.$refs.fname.scrollIntoView({behavior: 'smooth', block: "start", inline: "nearest"});
                    setTimeout(() => this.$refs.fname.focus(), 500);
                    this.errors = "يرجى إدخال الإسم واللقب بشكل صحيح"
                } else if (!/^[0][567][0-9]{8}$/.test(this.phone)) {
                    this.$refs.fname.scrollIntoView({behavior: 'smooth', block: "start", inline: "nearest"});
                    setTimeout(() => this.$refs.phone.focus(), 500);
                        this.errors = "يرجى التأكد من رقم هاتف المدخل "
                } else if (!/^.{4,30}$/.test(this.adresse)) {
                    this.$refs.fname.scrollIntoView({behavior: 'smooth', block: "start", inline: "nearest"});
                    setTimeout(() => this.$refs.adresse.focus(), 500);
                    this.errors = "يرجى إدخال عنوان صحيح"
                } else if (this.wilaya.length == 0) {
                    this.$refs.fname.scrollIntoView({behavior: 'smooth', block: "start", inline: "nearest"});
                    setTimeout(() => this.$refs.wilaya.focus(), 500);
                    this.errors = "يرجى إختيار الولاية"
                } else if (this.commune.length == 0) {
                    this.$refs.fname.scrollIntoView({behavior: 'smooth', block: "start", inline: "nearest"});
                    setTimeout(() => this.$refs.commune.focus(), 500);
                        this.errors = "يرجى إختيار البلدية"
                }
                else {
                    this.load = true;
                    axios.post('/saveOrder', {
                        product_id: this.product.id,
                        full_name: this.fullname,
                        phone: this.phone,
                        commune_id: this.commune,
                        adresse: this.adresse,
                        remarque: this.remarque
                    }).then((response) => {
 //                       this.load = false;
                        window.location.href = "product?name="+this.fullname;
                    })
                }
            }

        },
    };
</script>

<style>
    * {
        font-family: Tajawal;
        font-size: 13pt;
    }

    input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    input[type=submit] {
        font-weight: 600;
        width: 100%;
        padding: 12px 20px;
        cursor: pointer;
        outline: none;
        transition: all .25s;
        background-color: #a23c76;
        border: none;
        border-radius: 8px;
        font-size: 14pt;
        color: #ffffff;

    }

    input[type=submit]:hover {
        background-color: #803160;
        color: #000;
    }

    .wrapper {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;

    }

    .coll {
        float: left;
        width: 100%;
        margin-top: 0;
    }

    .roww, .row1 {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

    }

    .row1 {
        position: fixed;
        display: flex;
        width: 100%;
        height: 55px;
        bottom: 0;
        left: 0;
        right: 0;
        text-align: center;
        align-items: center;
        justify-content: center;
        transition: opacity 0.3s, height 0.3s 0.1s;
        z-index: 12;
        background-color: #fff;
        border-top: 1px solid #f0f0f0;
        padding: 10px 0;
    }

    .row1 input[type=submit] {
        border-radius: 5px;
        max-width: 400px;
        width: 70%;
        height: 35px;
        background-color: red;
        font-size: 14px;
        padding: 8px;
    }

    /* Clear floats after the columns */
    .roww:after, .row1 {
        content: "";
        display: table;
        clear: both;
    }

    .total_pay {
        text-align: center;
        margin-bottom: 20px;
        font-size: 16pt;
        font-weight: bold;
        color: #e23333;
    }

    .error, .valid {
        position: fixed;
        display: flex;
        width: auto;
        height: 50px;
        background-color: #e23333;
        outline: none;
        bottom: 70px;
        font-size: 14px;
        color: #0d141f;
        left: 0;
        right: 0;
        margin-left: 100px;
        margin-right: 100px;
        border-radius: 10px;
        text-align: center;
        font-size: 14pt;
        font-family: Tajawal;
        font-weight: 600;
        align-items: center;
        justify-content: center;
        transition: all .25s;
        z-index: 12;
    }

    .valid {
        background-color: #40ff7b;
        top: 50%;
    }

    @media (max-width: 600px) {
        .error {
            margin-left: 20px;
            margin-right: 20px;
        }
    }

    .body {
        height: 100%;
        width: 100%;
        z-index: 15;
        background: #ea4961;
        position: fixed;
        display: flex;
        flex-direction: column;
        top: 0;
        left: 0;
        align-items: center;
        justify-content: center;
    }

    .load {
        font-size: 14pt;
        font-weight: bolder;
        font-family: Tajawal;
        margin-top: 15px;
    }

    .loader {
        position: relative;
        width: 75px;
        height: 100px;
    }

    .loader__bar {
        position: absolute;
        bottom: 0;
        width: 10px;
        height: 50%;
        background: #fff;
        transform-origin: center bottom;
        box-shadow: 1px 1px 0 rgba(0, 0, 0, 0.2);
    }

    .loader__bar:nth-child(1) {
        left: 0px;
        transform: scale(1, 0.2);
        -webkit-animation: barUp1 4s infinite;
        animation: barUp1 4s infinite;
    }

    .loader__bar:nth-child(2) {
        left: 15px;
        transform: scale(1, 0.4);
        -webkit-animation: barUp2 4s infinite;
        animation: barUp2 4s infinite;
    }

    .loader__bar:nth-child(3) {
        left: 30px;
        transform: scale(1, 0.6);
        -webkit-animation: barUp3 4s infinite;
        animation: barUp3 4s infinite;
    }

    .loader__bar:nth-child(4) {
        left: 45px;
        transform: scale(1, 0.8);
        -webkit-animation: barUp4 4s infinite;
        animation: barUp4 4s infinite;
    }

    .loader__bar:nth-child(5) {
        left: 60px;
        transform: scale(1, 1);
        -webkit-animation: barUp5 4s infinite;
        animation: barUp5 4s infinite;
    }

    .loader__ball {
        position: absolute;
        bottom: 10px;
        left: 0;
        width: 10px;
        height: 10px;
        background: #fff;
        border-radius: 50%;
        -webkit-animation: ball 4s infinite;
        animation: ball 4s infinite;
    }

    @-webkit-keyframes ball {
        0% {
            transform: translate(0, 0);
        }
        5% {
            transform: translate(8px, -14px);
        }
        10% {
            transform: translate(15px, -10px);
        }
        17% {
            transform: translate(23px, -24px);
        }
        20% {
            transform: translate(30px, -20px);
        }
        27% {
            transform: translate(38px, -34px);
        }
        30% {
            transform: translate(45px, -30px);
        }
        37% {
            transform: translate(53px, -44px);
        }
        40% {
            transform: translate(60px, -40px);
        }
        50% {
            transform: translate(60px, 0);
        }
        57% {
            transform: translate(53px, -14px);
        }
        60% {
            transform: translate(45px, -10px);
        }
        67% {
            transform: translate(37px, -24px);
        }
        70% {
            transform: translate(30px, -20px);
        }
        77% {
            transform: translate(22px, -34px);
        }
        80% {
            transform: translate(15px, -30px);
        }
        87% {
            transform: translate(7px, -44px);
        }
        90% {
            transform: translate(0, -40px);
        }
        100% {
            transform: translate(0, 0);
        }
    }

    @keyframes ball {
        0% {
            transform: translate(0, 0);
        }
        5% {
            transform: translate(8px, -14px);
        }
        10% {
            transform: translate(15px, -10px);
        }
        17% {
            transform: translate(23px, -24px);
        }
        20% {
            transform: translate(30px, -20px);
        }
        27% {
            transform: translate(38px, -34px);
        }
        30% {
            transform: translate(45px, -30px);
        }
        37% {
            transform: translate(53px, -44px);
        }
        40% {
            transform: translate(60px, -40px);
        }
        50% {
            transform: translate(60px, 0);
        }
        57% {
            transform: translate(53px, -14px);
        }
        60% {
            transform: translate(45px, -10px);
        }
        67% {
            transform: translate(37px, -24px);
        }
        70% {
            transform: translate(30px, -20px);
        }
        77% {
            transform: translate(22px, -34px);
        }
        80% {
            transform: translate(15px, -30px);
        }
        87% {
            transform: translate(7px, -44px);
        }
        90% {
            transform: translate(0, -40px);
        }
        100% {
            transform: translate(0, 0);
        }
    }

    @-webkit-keyframes barUp1 {
        0% {
            transform: scale(1, 0.2);
        }
        40% {
            transform: scale(1, 0.2);
        }
        50% {
            transform: scale(1, 1);
        }
        90% {
            transform: scale(1, 1);
        }
        100% {
            transform: scale(1, 0.2);
        }
    }

    @keyframes barUp1 {
        0% {
            transform: scale(1, 0.2);
        }
        40% {
            transform: scale(1, 0.2);
        }
        50% {
            transform: scale(1, 1);
        }
        90% {
            transform: scale(1, 1);
        }
        100% {
            transform: scale(1, 0.2);
        }
    }

    @-webkit-keyframes barUp2 {
        0% {
            transform: scale(1, 0.4);
        }
        40% {
            transform: scale(1, 0.4);
        }
        50% {
            transform: scale(1, 0.8);
        }
        90% {
            transform: scale(1, 0.8);
        }
        100% {
            transform: scale(1, 0.4);
        }
    }

    @keyframes barUp2 {
        0% {
            transform: scale(1, 0.4);
        }
        40% {
            transform: scale(1, 0.4);
        }
        50% {
            transform: scale(1, 0.8);
        }
        90% {
            transform: scale(1, 0.8);
        }
        100% {
            transform: scale(1, 0.4);
        }
    }

    @-webkit-keyframes barUp3 {
        0% {
            transform: scale(1, 0.6);
        }
        100% {
            transform: scale(1, 0.6);
        }
    }

    @keyframes barUp3 {
        0% {
            transform: scale(1, 0.6);
        }
        100% {
            transform: scale(1, 0.6);
        }
    }

    @-webkit-keyframes barUp4 {
        0% {
            transform: scale(1, 0.8);
        }
        40% {
            transform: scale(1, 0.8);
        }
        50% {
            transform: scale(1, 0.4);
        }
        90% {
            transform: scale(1, 0.4);
        }
        100% {
            transform: scale(1, 0.8);
        }
    }

    @keyframes barUp4 {
        0% {
            transform: scale(1, 0.8);
        }
        40% {
            transform: scale(1, 0.8);
        }
        50% {
            transform: scale(1, 0.4);
        }
        90% {
            transform: scale(1, 0.4);
        }
        100% {
            transform: scale(1, 0.8);
        }
    }

    @-webkit-keyframes barUp5 {
        0% {
            transform: scale(1, 1);
        }
        40% {
            transform: scale(1, 1);
        }
        50% {
            transform: scale(1, 0.2);
        }
        90% {
            transform: scale(1, 0.2);
        }
        100% {
            transform: scale(1, 1);
        }
    }

    @keyframes barUp5 {
        0% {
            transform: scale(1, 1);
        }
        40% {
            transform: scale(1, 1);
        }
        50% {
            transform: scale(1, 0.2);
        }
        90% {
            transform: scale(1, 0.2);
        }
        100% {
            transform: scale(1, 1);
        }
    }


    /* ------------------------------------------------- */

    .whatsapp-bg, .facebook-bg {
        display: inline-flex;
        width: 36px;
        height: 36px;
        border-radius: 3px;
        text-align: center;
        align-items: center;
        justify-content: center;
        color: white;
        margin-left: 5px;
    }

    #fname,#phone,#wilaya,#commune,#adresse{
        scroll-margin-top: 170px;
    }

    .coll2 {
        display: flex;

    }

    .roww1{
        width: 50%;
        margin-right: 5px;
    }
</style>
