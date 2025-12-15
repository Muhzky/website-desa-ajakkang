FROM php:8.2-cli

# 1️⃣ Install curl & git (wajib)
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    zip \
    && rm -rf /var/lib/apt/lists/*

# 2️⃣ Install install-php-extensions (INI YANG KAMU KELEWAT)
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions

# 3️⃣ Install PHP extensions WAJIB Filament
RUN install-php-extensions \
    intl \
    zip \
    pdo_mysql \
    mbstring \
    xml \
    bcmath \
    opcache

# 4️⃣ Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# 5️⃣ Install dependencies
RUN composer install --optimize-autoloader --no-interaction

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
