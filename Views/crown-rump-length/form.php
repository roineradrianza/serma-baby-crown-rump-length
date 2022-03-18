<div ref="serma_crl_container" class="container md:border border-gray-300 rounded-2xl px-4 md:px-0">
    <div class="grid grid-cols-1 md:grid-cols-8">
        <div class="hidden md:inline col-span-3 px-3 md:px-3 py-6 bg-cover" style="background-image: url('<?= SERMA_BABY_CRL_URL ?>/assets/img/section-1-bg.svg'); background-repeat: no-repeat">
            <div class="baby-comment-box pt-1 px-4">
                <h2 class="text-24px text-center md:text-left text-black font-semibold mb-4">
                    Longitud fetal <span class="font-['Cookie'] text-purple-lighten font-normal text-40px">(Céfalo-Caudal)</span>
                </h2>
            </div>
            <img class="pb-3 max-w-[208px] mx-auto" src="<?= SERMA_BABY_CRL_URL ?>/assets/img/crown-rump-length-bg.png">
        </div>

        <div class="bg-yellow-lighten md:col-span-5 p-3 md:p-6 rounded-2xl md:rounded-l-none">
            <form class="pt-1" method="post">
                <h2 class="md:hidden mx-8 px-4 bg-white rounded-tr-3xl rounded-bl-3xl text-18px text-black text-center font-semibold mb-4">
                    Longitud fetal <br> <span class="font-['Cookie'] text-purple-lighten font-normal text-[28px]">(Céfalo-Caudal)</span></h2>
                <div class="col-span-2 flex items-center">
                    <img class="w-[20px] mr-2" src="<?= SERMA_BABY_CRL_URL ?>/assets/icons/calendar.svg">
                    <p class="text-secondary text-13px md:text-14px">
                        Número de semana
                    </p>
                </div>

                <div class="mb-5">

                    <div class="mt-3 flex">

                        <template v-for="val, i in weeks">
                            <label class="w-full md:w-auto">
                                <input checked type="radio" v-model="form.weeks_nro" name="weeks_nro" class="hidden peer" :value="val" v-if="i == 0" />
                                <input type="radio" v-model="form.weeks_nro" name="weeks_nro" class="hidden peer" :value="val" v-else />

                                <div class="peer-checked:bg-green-lighten peer-checked:text-white peer-checked:font-semibold
                                     bg-white py-2 md:py-1.5 mr-2 text-center text-13px md:text-14px rounded-full" 
                                     :class="{'px-3': val <= 9, 'px-2.5': val >= 10 }">
                                    {{ val }}
                                </div>
                            </label>
                        </template>

                    </div>

                </div>

                <div class="col-span-2 flex items-center">
                    <img class="w-[20px] mr-2" src="<?= SERMA_BABY_CRL_URL ?>/assets/icons/rule.svg">
                    <p class="text-secondary text-13px md:text-14px">
                        Unidad
                    </p>
                </div>

                <div class="mb-5">

                    <div class="mt-3 justify-between grid grid-cols-4 gap-y-2">
                        <label class="w-full md:w-auto">
                            <input checked type="radio" v-model="form.unity" name="unity" class="hidden peer" value="cm" />
                            <div class="peer-checked:border-green-lighten peer-checked:text-green-lighten peer-checked:font-semibold 
                                peer-checked:border-2 bg-white peer-checked:px-3.5 peer-checked:py-1.5 py-2 md:py-2 px-5 mr-2 text-center text-13px md:text-16px rounded-full">
                                cm</div>
                        </label>

                        <label class="w-full md:w-auto">
                            <input type="radio" v-model="form.unity" name="unity" class="hidden peer" value="mm" />
                            <div class="peer-checked:border-green-lighten peer-checked:text-green-lighten peer-checked:font-semibold 
                                peer-checked:border-2 bg-white peer-checked:px-3.5 peer-checked:py-1.5 py-2 md:py-2 px-5 mr-2 text-center text-13px md:text-16px rounded-full">
                                mm</div>
                        </label>

                    </div>

                </div>

                <button type="button" class="my-3 w-full md:w-auto rounded text-14px bg-green-lighten px-4 py-4 md:px-6 md:py-3 text-white font-regular" @click="getResults" :disabled="loading">
                    <span v-if="loading">Calculando...</span>
                    <span v-else>
                        Conoce el tamaño del feto
                    </span>
                </button>
            </form>
        </div>

    </div>
</div>

<?= SERMA_BABY_CRL_TEMPLATE::show_template('crown-rump-length/form/results') ?>