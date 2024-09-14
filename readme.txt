/* ENVIRONEMENT UNIQUE */
docker-compose down
docker-compose build
docker-compose up -d

/* DEV */
docker-compose -f docker-compose-dev.yml down
docker-compose -f docker-compose-dev.yml build
docker-compose -f docker-compose-dev.yml up -d

/* PROD */
docker-compose -f docker-compose-prod.yml down
docker-compose -f docker-compose-prod.yml build
docker-compose -f docker-compose.prod.yml up -d