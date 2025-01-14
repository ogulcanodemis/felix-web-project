# FELIX Çilingir Projesi Dokümantasyonu

## Proje Yapısı
```/public_html/felix-php-app/```
├── app/
│   ├── Models/
│   │   ├── Post.php         # Temel sayfa içerik modeli (çevrilebilir alanlar)
│   │   └── WebLink.php      # URL yönetimi ve yönlendirme modeli
│   ├── Http/
│   │   └── Middleware/
│   │       └── SetLocaleFromUrl.php  # URL'den dil tespiti
├── resources/
│   ├── themes/felix/
│   │   ├── components/      # Yeniden kullanılabilir blade bileşenleri
│   │   │   ├── header.blade.php
│   │   │   ├── navbar.blade.php
│   │   │   └── layouts/
│   │   │       └── app.blade.php
│   │   ├── pages/          # Sayfa şablonları
│   │   │   ├── index.blade.php
│   │   │   ├── location.blade.php
│   │   │   └── page.blade.php
│   │   └── partials/       # Kısmi görünümler
│   │       └── head.blade.php
├── lang/                   # Dil dosyaları
│   ├── de/
│   │   └── messages.php    # Almanca çeviriler
│   ├── en/
│   │   └── messages.php    # İngilizce çeviriler
│   └── tr/
│       └── messages.php    # Türkçe çeviriler
└── routes/
    └── web.php            # Dil önekli route tanımları

## Çoklu Dil Desteği

### 1. URL Yapısı
- Temel URL'ler şu deseni takip eder: `/{locale}/{slug}`
- Desteklenen diller: 'de', 'en', 'tr'
- Örnek: 
  - DE: /de/schlusselnotdienst
  - EN: /en/emergency-locksmith
  - TR: /tr/acil-cilingir

### 2. Veritabanı Yapısı
#### WebLink Modeli
- URL yönlendirme ve çevirilerini yönetir
- Alanlar:
  - `name`: Benzersiz tanımlayıcı
  - `type`: Ana sayfalar için 'base'
  - `url`: Çevrilen URL'ler için JSON alanı
  - `web_linkable_type`: İlişkili model (genellikle Post)
  - `web_linkable_id`: İlişkili model ID'si

#### Post Modeli
- Sayfa içeriğini saklar
- Çevrilebilir alanlar:
  - `title`: Sayfa başlığı
  - `description`: Meta açıklaması
  - `content`: Ana içerik
  - `slug`: URL kısayolu

### 3. Çeviri Dosyaları
Konum: `lang/{locale}/messages.php`
İçerik türleri:
- Arayüz elemanları
- Navigasyon menüsü
- Hizmet isimleri
- Meta bilgileri
- Hata mesajları

### 4. Bileşenler
#### Düzen Bileşenleri
- `layouts/app.blade.php`: Ana düzen şablonu
- `header.blade.php`: Site başlığı ve navigasyon
- `navbar.blade.php`: Dil seçicili navigasyon menüsü

#### Sayfa Şablonları
- `index.blade.php`: Ana sayfa şablonu
- `location.blade.php`: Konum-spesifik sayfalar
- `page.blade.php`: Genel sayfa şablonu

## Son Güncellemeler (19 Mart 2024)

### 1. Temel Sayfalara İngilizce Çeviriler Eklendi
Tüm temel sayfalar artık eksiksiz İngilizce çevirilere sahip:
1. Acil Çilingir (ID: 1)
   - Başlık: "Emergency Locksmith"
   - URL: /en/emergency-locksmith

2. Çilingir Hizmeti (ID: 2)
   - Başlık: "Locksmith Service"
   - URL: /en/locksmith-service

3. Fiyatlar (ID: 3)
   - Başlık: "Prices"
   - URL: /en/prices

4. Kasa Açma (ID: 4)
   - Başlık: "Safe Opening"
   - URL: /en/safe-opening

5. Hizmet Alanları (ID: 5)
   - Başlık: "Service Areas"
   - URL: /en/service-areas

6. Kapı Açma Hizmeti (ID: 6)
   - Başlık: "Lock Opening Service"
   - URL: /en/lock-opening-service

7. Araba Anahtarı Kopyalama (ID: 7)
   - Başlık: "Car Key Copy"
   - URL: /en/car-key-copy

8. Anahtar Kopyalama (ID: 8)
   - Başlık: "Key Copy"
   - URL: /en/key-copy

9. Araba Açma (ID: 10)
   - Başlık: "Car Opening"
   - URL: /en/car-opening

10. Kilit Sistemi (ID: 11)
    - Başlık: "Locking System"
    - URL: /en/locking-system

11. Hırsızlık Koruması (ID: 12)
    - Başlık: "Burglary Protection"
    - URL: /en/burglary-protection

### 2. Navigasyon Menüsü Çevirileri Güncellendi
`messages.php` dosyasına eklenen İngilizce çeviriler:
```php
'services' => [
    'door_opening' => 'Kapı Açma',
    'key_making' => 'Anahtar Yapımı',
    'car_opening' => 'Araba Açma',
    'safe_opening' => 'Kasa Açma',
    'car_key_making' => 'Araba Anahtarı Yapımı',
    'lock_opening' => 'Kilit Açma Hizmeti',
    'burglary_protection' => 'Hırsızlık Koruması',
    'locking_system' => 'Kilit Sistemi',
    'service_areas' => 'Hizmet Alanları',
    'emergency_service' => 'Acil Servis',
    'prices' => 'Fiyatlar'
],
```

## Yeni Çeviri Ekleme

### 1. WebLink Kaydı Ekleme
```php
WebLink::create([
    'name' => 'sayfa-adi',
    'type' => 'base',
    'url' => [
        'de' => 'almanca-url',
        'en' => 'ingilizce-url',
        'tr' => 'turkce-url'
    ]
]);
```

### 2. Post İçeriği Ekleme
```php
Post::create([
    'title' => [
        'de' => 'Almanca Başlık',
        'en' => 'İngilizce Başlık',
        'tr' => 'Türkçe Başlık'
    ],
    'description' => [
        'de' => 'Almanca Meta Açıklama',
        'en' => 'İngilizce Meta Açıklama',
        'tr' => 'Türkçe Meta Açıklama'
    ],
    'content' => [
        'de' => 'Almanca İçerik',
        'en' => 'İngilizce İçerik',
        'tr' => 'Türkçe İçerik'
    ]
]);
```

### 3. Arayüz Çevirileri Ekleme
Çevirileri ilgili `messages.php` dosyalarına ekleyin: `lang/{locale}/`.

## Performans Optimizasyonu
- CSS/JS dosyaları `media="print" onload="this.media='all'"` ile yüklenir
- Görseller `<link rel="preload">` ile önceden yüklenir
- Font Awesome asenkron olarak yüklenir
- .htaccess'te önbellek kuralları uygulanır

## Güvenlik Önlemleri
- Tüm çeviriler varsayılan olarak HTML-escape edilir
- URL parametreleri temizlenir
- Dil kodları beyaz liste ile doğrulanır
- Veritabanı sorguları prepared statements kullanır

## Sorun Giderme
1. Çevirileri güncelledikten sonra önbelleği temizleyin:
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

2. Veritabanı bağlantısını .env'de doğrulayın:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=felix_db_app
DB_USERNAME=root
DB_PASSWORD=
```

3. Dosya izinlerini kontrol edin:
- Storage dizini yazılabilir olmalı
- Cache dizini yazılabilir olmalı

## Gelecek İyileştirmeler
1. Çeviri önbellekleme sistemi
2. Otomatik çeviri yedekleme
3. Çeviri sürüm kontrolü
4. Çeviri yönetim arayüzü
5. Otomatik URL kısayolu oluşturma

## Proje Yapısı ve Çoklu Dil Desteği Dokümantasyonu

### 1. Route Yapısı Değişiklikleri
`routes/web.php` dosyasındaki değişiklikler:

```php
// Ana sayfa route'u
Route::view('/', 'theme::pages.index', ['localeWeblinks' => array_combine(['de', 'en', 'tr'], ['', '', ''])])

// Eski URL route'ları (dil öneki olmadan)
$webLinksIndex = WebLink::with('web_linkable')->where('type', '=', 'old_url')->get();
// Bu URL'ler /felix-schluesseldienst/* şeklinde kalır

// Çoklu dil route'ları (/de/*, /en/*, /tr/*)
$languages = ['de', 'en', 'tr'];
foreach ($languages as $lang) {
    Route::group(['prefix' => $lang, 'as' => "{$lang}."], function () use ($lang) {
        // Her dil için route'lar
    });
}
```

### 2. View Yapısı
`AppServiceProvider.php` dosyasındaki değişiklikler:

```php
public function boot(): void
{
    // Theme views kaydı
    View::addNamespace('theme', resource_path('themes/felix'));
    
    // Fallback view path
    View::addLocation(resource_path('themes/felix'));
}
```

### 3. Dil Dosyaları
Oluşturulan `lang/{locale}/messages.php` dosyaları:
- `lang/de/messages.php` (Almanca)
- `lang/en/messages.php` (İngilizce)
- `lang/tr/messages.php` (Türkçe)

### 4. Middleware
Güncellenen `app/Http/Middleware/SetLocaleFromUrl.php` middleware:

```php
public function handle(Request $request, Closure $next)
{
    $segments = $request->segments();
    $locale = $segments[0] ?? 'de';
    
    if (in_array($locale, ['de', 'en', 'tr'])) {
        App::setLocale($locale);
    } else {
        App::setLocale('de');
    }

    return $next($request);
}
```

### 5. Navbar Dil Seçici
`resources/themes/felix/components/navbar.blade.php` dosyasına eklenen dil seçici:

```php
<div class="language-switcher me-3">
    <div class="btn-group">
        <button type="button" class="btn btn-outline-primary dropdown-toggle">
            @php
                $languages = [
                    'de' => ['name' => 'Deutsch', 'flag' => '🇩🇪'],
                    'en' => ['name' => 'English', 'flag' => '🇬🇧'],
                    'tr' => ['name' => 'Türkçe', 'flag' => '🇹🇷']
                ];
            @endphp
            // ... dil seçici kodu
        </button>
    </div>
</div>
```

### 6. Sayfa İçerik Çevirileri (14.03.2024)
1. Çeviri Namespace'leri:
   - `location`: Konum sayfası için çeviriler
   - `index`: Ana sayfa için çeviriler
   - Genel: Tüm sayfalarda kullanılan ortak çeviriler

2. Çeviri Yapısı:
```php
   return [
       // Genel çeviriler
       'your_city' => 'Şehriniz',
       'service_title' => 'Çilingir',
       
       // Konum sayfası çevirileri
       'location' => [
           'always_available' => 'Her zaman hizmetinizdeyiz',
           'door_fallen' => 'Kapı mı kilitlendi?',
           // ...
       ],
       
       // Ana sayfa çevirileri
       'index' => [
           'door_fallen' => 'Kapı mı kilitlendi? Endişelenmeyin!',
           'felix_nearby' => 'Felix Çilingir yakınınızda',
           // ...
       ]
   ];
```

3. Parametre Kullanımı:
   - Fiyat: `:price` (örn: "Sabit fiyat :price€")
   - Yıl: `:years` (örn: ":years yıllık deneyim")
   - Konum: `:location` (örn: ":location bölgesinde hizmet")

4. View Dosyalarında Kullanım:
```php
   {{ __('messages.location.door_fallen') }}
   {{ __('messages.index.felix_nearby') }}
   {{ __('messages.location.fixed_price', ['price' => '59']) }}
```

## URL Yapısı

1. **Eski URL'ler**:
   - Desen: `/felix-schluesseldienst/*`
   - Dil öneki YOK
   - Örnek: `/felix-schluesseldienst-stuttgart`

2. **Konum URL'leri**:
   - Desen: `/{lang}/schluesseldienst-*`
   - Dil öneki VAR
   - Örnek: `/de/schluesseldienst-stuttgart`

## Önemli Notlar

1. **SEO Yapısı**:
   - Her dil için ayrı URL yapısı
   - Doğru dil yönlendirmeleri
   - Sitemap güncellemeleri

2. **Performans**:
   - View önbellekleme aktif
   - Route önbellekleme aktif
   - Dil dosyaları önbellekleniyor

3. **Güvenlik**:
   - XSS koruması
   - URL manipülasyonu kontrolü
   - Dil kodları doğrulaması

4. **Bakım**:
   - Yeni dil eklerken `$languages` dizisini güncelle
   - Yeni çeviriler eklerken tüm dil dosyalarını güncelle
   - Önbelleği temizlemeyi unutma

## Sorun Giderme

1. **View Bulunamadı Hatası**:
   - Theme yollarını kontrol et
   - View namespace'lerini kontrol et
   - Önbelleği temizle

2. **Dil Değişmeme Sorunu**:
   - Middleware sırasını kontrol et
   - Session yapılandırmasını kontrol et
   - Route öneklerini kontrol et

3. **URL Yönlendirme Sorunları**:
   - Route tanımlarını kontrol et
   - Middleware sırasını kontrol et
   - URL desenlerini kontrol et

## 14 Mart 2024 Güncellemeleri

### Karşılaşılan Sorunlar ve Çözümler

1. **Dil Değiştirme Sorunu**
   - İngilizceye geçişte URL'ler değişiyor ancak içerik Almanca kalıyor
   - Örnek: `http://localhost:8000/tr/fiyatlar` -> `http://localhost:8000/en/preise`
   - Etkilenen sayfalar:
     * Schlüsseldienst (Çilingir/Locksmith)
     * Tresoröffnung (Kasa Açma/Safe Opening)
     * Einsatzgebiete (Hizmet Alanları/Service Areas)
     * Schlüsselkopieren (Anahtar Kopyalama/Key Copying)

2. **Teknik Detaylar**
   - WebLink modeli (`app/Models/WebLink.php`):
     * URL çevirileri `$translatable = ['url']` ile yönetiliyor
     * Her sayfa için bir WebLink kaydı gerekli
     * Post ve Taxonomy modelleri ile morph ilişkisi var
   - URL yönetimi:
     * web_links tablosunda JSON formatında saklanıyor
     * Her dil için ayrı URL çevirisi mevcut
     * Dil değiştirme navbar.blade.php'de yönetiliyor

3. **Yapılacaklar**
   - [x] Sorunun tespiti ve analizi
   - [x] WebLink modelinin incelenmesi
   - [x] URL yapısının analizi
   - [x] İngilizce WebLink kayıtlarının oluşturulması
   - [x] URL çevirilerinin güncellenmesi
   - [x] Dil değiştirme mantığının düzeltilmesi

### Önemli Notlar
- Sabit URL mapping yerine dinamik WebLink sistemi kullanılmalı
- WebLink kayıtları tüm diller için eksiksiz olmalı
- URL ve içerik yönetimi birlikte çalışır 