# translation_service

# Setup Instructions

1. **Clone the Repository & Install Dependencies**  
   ```bash
   git clone https://github.com/DevUsmankhanEsed/translation_service.git
   cd translation_service
   composer install 

2. **Configure Environment Variables**
    Copy .env.example to .env
    Update database credentials in .env:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=translation_service
    DB_USERNAME=root
    DB_PASSWORD=
    
3. **Run Migrations & Seed Database and key generate**

4. **Run Apis using**

    http://127.0.0.1:8000/api/translations

