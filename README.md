# FELIX Çilingir Projesi

## Proje Hakkında
FELIX Çilingir, Stuttgart ve çevresinde 24/7 çilingir hizmeti sunan profesyonel bir web uygulamasıdır. Proje, Laravel framework'ü kullanılarak geliştirilmiş olup, çoklu dil desteği (Almanca, İngilizce, Türkçe) sunmaktadır.

## Özellikler
- 🌐 Çoklu dil desteği (DE, EN, TR)
- 🔒 SEO optimizasyonu
- 📱 Mobil uyumlu tasarım
- 🚀 Yüksek performans optimizasyonu
- 💳 Çoklu ödeme seçenekleri
- 📍 Bölgesel hizmet yönetimi
- 📊 Google Analytics entegrasyonu

## Teknik Altyapı
- Laravel Framework
- MySQL Veritabanı
- Bootstrap 5
- Alpine.js
- Font Awesome
- Google Tag Manager

## Kurulum
1. Projeyi klonlayın:
```bash
git clone [proje-url]
```

2. Bağımlılıkları yükleyin:
```bash
composer install
npm install
```

3. .env dosyasını oluşturun:
```bash
cp .env.example .env
```

4. Veritabanı ayarlarını yapılandırın:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=felix_db_app
DB_USERNAME=[kullanıcı-adı]
DB_PASSWORD=[şifre]
```

5. Uygulama anahtarını oluşturun:
```bash
php artisan key:generate
```

6. Veritabanı tablolarını oluşturun:
```bash
php artisan migrate
```

## Çoklu Dil Yapısı
- `resources/lang/` dizini altında dil dosyaları
- URL tabanlı dil değiştirme sistemi
- Dinamik içerik çevirileri
- SEO uyumlu URL yapısı

## Performans Optimizasyonları
- CSS/JS dosyaları için lazy loading
- Görsel optimizasyonları
- Browser caching
- Gzip sıkıştırma
- CDN kullanımı

## Sitemap
Sitemap, arama motorlarının web sitesinin yapısını daha iyi anlamasını sağlar. Sitemap dosyası aşağıdaki yolda bulunur:
```
public/sitemap.xml
```

Sitemap şu özellikleri içerir:
- Tüm dillerdeki sayfalar (DE, EN, TR)
- Her sayfa için son güncelleme tarihi
- Sayfa öncelikleri
- Değişim sıklığı bilgisi

Sitemap'i manuel olarak güncellemek için:
```bash
php artisan sitemap:generate
```

## Güvenlik
- CSRF koruması
- XSS önleme
- SQL enjeksiyon koruması
- Güvenli oturum yönetimi

## Bakım ve Güncelleme
```bash
# Önbelleği temizleme
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Route önbelleğini yenileme
php artisan route:cache

# Composer autoload dosyalarını güncelleme
composer dump-autoload
```

## Katkıda Bulunma
1. Fork'layın
2. Feature branch oluşturun (`git checkout -b feature/AmazingFeature`)
3. Commit'leyin (`git commit -m 'Add some AmazingFeature'`)
4. Branch'e push yapın (`git push origin feature/AmazingFeature`)
5. Pull Request oluşturun

## Lisans
Bu proje [MIT lisansı](LICENSE) altında lisanslanmıştır.

## İletişim
FELIX Schlüsseldienst  
📞 Telefon: +49 176 23513191  
📧 E-posta: [e-posta-adresi]  
🌐 Website: https://felixschlusseldienst.de 