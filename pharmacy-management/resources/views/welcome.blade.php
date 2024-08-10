@extends('main')

@section('title', 'Welcome to Our Pharmacy')

@section('content')
<!-- Hero Section -->
<section class="bg-blue-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center">
            <h1 class="text-4xl font-bold">Welcome to Our Pharmacy</h1>
            <p class="mt-4 text-lg">Your Trusted Partner in Pharmacy Excellence.</p>
            <a href="#" class="mt-8 inline-block bg-white text-blue-600 px-8 py-3 font-semibold rounded-md shadow hover:bg-gray-100">Get Started</a>
        </div>
    </div>
</section>

<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center">Our Products</h2>

        <script src="https://cdn.jsdelivr.net/npm/tailwindcss-cdn@3.4.1/tailwindcss.js"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <div x-data="swipeCards()" x-init="
			let isDown = false;
			let startX;
			let scrollLeft;
			$el.addEventListener('mousedown', (e) => {
			isDown = true;
			startX = e.pageX - $el.offsetLeft;
			scrollLeft = $el.scrollLeft;
			});
			$el.addEventListener('mouseleave', () => {
			isDown = false;
			});
			$el.addEventListener('mouseup', () => {
			isDown = false;
			});
			$el.addEventListener('mousemove', (e) => {
			if (!isDown) return;
			e.preventDefault();
			const x = e.pageX - $el.offsetLeft;
			const walk = (x - startX) * 1;
			$el.scrollLeft = scrollLeft - walk;
			});
			" class="overflow-x-scroll scrollbar-hide mb-4 relative px-0.5" style="overflow-y: hidden;">
            <div class="flex snap-x snap-mandatory gap-4" style="width: max-content;">
                <template x-for="card in cards" :key="card.id">
                    <div class="flex-none w-64 snap-center">
                        <div class="bg-white border-1 border border-gray-200 rounded-lg overflow-hidden mb-4">
                            <img :src="card.image" alt="" class="w-full h-40 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg leading-6 font-bold text-gray-900" x-text="card.title"></h3>
                                <p class="text-gray-600 mt-2 text-sm" x-text="card.description"></p>
                                <div class="flex justify-between items-center mt-4">
                                    <span class="text-2xl font-extrabold text-gray-900" x-text="'$' + card.price.toFixed(2)"></span>
                                    <a :href="card.link"
                                        class="text-white bg-fuchsia-950 hover:bg-fuchsia-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                        </svg></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
        <script>
            function swipeCards() {
                return {
                    cards: [{
                            id: 1,
                            image: `{{asset('img/images.jpg')}}`,
                            title: 'Cocktail',
                            description: 'Tropical mix of flavors, perfect for parties.',
                            price: 8.99,
                            link: '#'
                        },
                        {
                            id: 2,
                            image: `{{asset('img/images.jpg')}}`,
                            title: 'Smoothie',
                            description: 'Refreshing blend of fruits and yogurt.',
                            price: 5.49,
                            link: '#'
                        },
                        {
                            id: 3,
                            image: `{{asset('img/images.jpg')}}`,
                            title: 'Iced Coffee',
                            description: 'Cold brewed coffee with a hint of vanilla.',
                            price: 4.99,
                            link: '#'
                        },
                        {
                            id: 4,
                            image: `{{asset('img/images.jpg')}}`,
                            title: 'Mojito',
                            description: 'Classic Cuban cocktail with mint and lime.',
                            price: 7.99,
                            link: '#'
                        },
                        {
                            id: 5,
                            image: `{{asset('img/images.jpg')}}`,
                            title: 'Matcha Latte',
                            description: 'Creamy green tea latte, rich in antioxidants.',
                            price: 6.49,
                            link: '#'
                        },
                        {
                            id: 6,
                            image: `{{asset('img/images.jpg')}}`,
                            title: 'Fruit Punch',
                            description: 'Sweet and tangy punch, bursting with fruity flavors.',
                            price: 3.99,
                            link: '#'
                        },
                        {
                            id: 7,
                            image: `{{asset('img/images.jpg')}}`,
                            title: 'Bubble Tea',
                            description: 'Chewy tapioca pearls in a sweet milk tea base.',
                            price: 4.99,
                            link: '#'
                        }
                    ],
                    addToCart(product) {
                        // Implement your add to cart logic here
                        console.log('Adding to cart:', product);
                    }
                };
            }
        </script>
    </div>
</section>
<!-- Additional Sections if needed -->

<!--About session-->
<section class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">About Us</h2>
            <p class="mt-4 text-lg text-gray-600">Your trusted partner in health and wellness.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <div class="relative">
                <img src="{{asset('img/imagesq.jpg')}}" alt="Pharmacy" class="w-full h-64 object-cover rounded-lg shadow-lg">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-50 rounded-lg"></div>
            </div>
            <div class="flex flex-col justify-center">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Our Mission</h3>
                <p class="text-gray-700 mb-4">
                    At [Pharmacy Name], our mission is to provide exceptional pharmaceutical care and support to our community. We are dedicated to ensuring that our patients receive the highest quality of service and the most accurate and timely medication management.
                </p>
                <p class="text-gray-700">
                    We believe in the importance of personalized care and strive to build lasting relationships with our customers. Our knowledgeable staff is here to assist you with your health needs, whether it's finding the right medication, providing health advice, or answering any questions you may have.
                </p>
            </div>
        </div>

        <div class="text-center mb-12">
            <h3 class="text-2xl font-semibold text-gray-900">Meet Our Team</h3>
            <p class="mt-2 text-lg text-gray-600">A group of dedicated professionals committed to your health.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="{{asset('img/list1.jpg')}}" alt="Pharmacist 1" class="w-24 h-24 rounded-full mx-auto mb-4">
                <h4 class="text-xl font-semibold text-gray-900">Dr. John Doe</h4>
                <p class="text-gray-700">Pharmacist-in-Charge</p>
                <p class="text-gray-600 mt-2">Dr. John Doe has over 15 years of experience in pharmacy practice and is dedicated to providing exceptional care and support to our patients.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="{{asset('img/2055051.png')}}" alt="Pharmacist 2" class="w-24 h-24 rounded-full mx-auto mb-4">
                <h4 class="text-xl font-semibold text-gray-900">Sarah Smith</h4>
                <p class="text-gray-700">Pharmacist</p>
                <p class="text-gray-600 mt-2">Sarah Smith is passionate about medication management and patient education. She brings a wealth of knowledge and experience to our team.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="{{asset('img/4747762.png')}}" alt="Pharmacist 3" class="w-24 h-24 rounded-full mx-auto mb-4">
                <h4 class="text-xl font-semibold text-gray-900">Michael Johnson</h4>
                <p class="text-gray-700">Pharmacy Technician</p>
                <p class="text-gray-600 mt-2">Michael Johnson is a skilled pharmacy technician with a focus on customer service and efficient medication dispensing. He ensures smooth operations at our pharmacy.</p>
            </div>
        </div>

        <div class="text-center mt-12">
            <h3 class="text-2xl font-semibold text-gray-900 mb-4">Contact Us</h3>
            <p class="text-gray-600 mb-4">Have any questions or need assistance? Reach out to us and we will be happy to help!</p>
            <a href="#" class="text-white bg-fuchsia-950 hover:bg-fuchsia-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Contact Us</a>
        </div>
    </div>
</section>

        
@endsection