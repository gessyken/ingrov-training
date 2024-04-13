<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ingrov training') }}
        </h2>
    </x-slot>
    <script src="https://cdn.cinetpay.com/seamless/main.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="container">
                        <div class="flex justify-center">
                            <div class="md:w-6/12 mt-5">
                                <div class="bg-blue-500 h-16 flex items-center justify-center">
                                    <h1 class="text-xl">Bienvenue sur Ingrov training Pay</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('inscriptions.store') }}" method="post" enctype="multipart/form-data">
                        <input type="file" name="doc1" id="" class="form-control" >
                        <input type="file" name="doc1" id="">
                        <input type="file" name="doc1" id="">
                        <input type="file" name="doc1" id="">
                        <input type="file" name="doc1" id="">
                        <input type="file" name="doc1" id="">
                        <input type="file" name="doc1" id="">
                    </form>
                        <button onclick="checkout()" class="">Buy fees</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        function checkout() {
            CinetPay.setConfig({
                apikey: '105436555865fa0d9bed7768.84517510',//   YOUR APIKEY
                site_id: '5870065',//YOUR_SITE_ID
                notify_url: 'http://kencode.comagropht.cm',
                mode: 'PRODUCTION'
            });
            CinetPay.getCheckout({
                transaction_id: Math.floor(Math.random() * 100000000).toString(), // YOUR TRANSACTION ID
                amount: 100,
                currency: 'XAF',
                channels: 'ALL',
                description: 'Formation Laravel - par KEN-CODE',
                //Fournir ces variables pour le paiements par carte bancaire
                customer_name:"Joe",//Le nom du client
                customer_surname:"Down",//Le prenom du client
                customer_email: "down@test.com",//l'email du client
                customer_phone_number: "088767611",//l'email du client
                customer_address : "BP 0024",//addresse du client
                customer_city: "Antananarivo",// La ville du client
                customer_country : "CM",// le code ISO du pays
                customer_state : "CM",// le code ISO l'état
                customer_zip_code : "06510", // code postal

            });
            CinetPay.waitResponse(function(data) {
                if (data.status == "REFUSED") {
                    if (alert("Votre paiement a échoué")) {
                        window.location.reload();
                    }
                } else if (data.status == "ACCEPTED") {
                    if (alert("Votre paiement a été effectué avec succès")) {
                        window.location.reload();
                    }
                }
            });
            CinetPay.onError(function(data) {
                console.log(data);
            });
        }
    </script>

</x-app-layout>
