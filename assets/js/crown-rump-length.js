/*VUE INSTANCE*/
const vm = Vue.createApp({
        data() {
            return {
                loading: false,
                show_result: false,
                weeks: [6, 7, 8, 9, 10, 11, 12, 13],
                form: {
                    weeks_nro: 6,
                    unity: 'cm'
                },
                form_default: {
                    weeks_nro: 6,
                    unity: 'cm'
                },
                results: {
                    nro: 0,
                    unity: 'cm'
                }
            }
        },

        methods: {
            getResults() {
                let app = this
                app.loading = true

                app.calc().then(res => {
                    app.results.nro = res
                    app.results.unity = app.form.unity

                    app.loading = false
                    app.show_result = true
                    app.$refs.serma_crl_results.scrollIntoView({
                        behavior: "smooth"
                    })
                })

            },

            resetForm() {
                let app = this
                app.show_result = false

                app.form = Object.assign({}, app.form_default)
                app.$refs.serma_crl_container.scrollIntoView({
                    behavior: "smooth"
                })
            },

            async calc() {
                let app = this

                let unitCh = app.form.unity;
                let crl = [0.45, 0.65, 0.92, 1.3, 1.5, 1.9, 2.2, 2.7, 3.1, 3.6, 4.1, 4.7, 5.2, 6.0, 6.5, 7.4, 7.9]
                let week = [6.0, 6.5, 7.0, 7.5, 8.0, 8.5, 9.0, 9.5, 10.0, 10.5, 11.0, 11.5, 12.0, 12.5, 13.0, 13.5, 14.0]
                let len = crl.length;
                let lhname = app.form.weeks_nro.toString();

                let splitChk = lhname.split('.');
                if (splitChk.length === 2) {
                    if (splitChk[1][0] > 5) {
                        lhname = parseFloat(splitChk[0]) + parseFloat(1)
                    }
                }

                for (let i = 0; i < len; i++) {
                    if (lhname - week[i] >= 0) {
                        crl2 = crl[i];
                        cresult = parseFloat(crl2);
                    }
                }

                if (unitCh == 'mm') {
                    cresult = cresult / 0.1;
                } else {
                    cresult = Math.round(cresult * 100) / 100;
                }


                return cresult

            },

        }
    })
    .mount('#serma-crl-container')