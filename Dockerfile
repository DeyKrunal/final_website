FROM node:18

WORKDIR /app

COPY nodejs-version/package.json .
COPY nodejs-version/package-lock.json .

RUN npm install

COPY nodejs-version .

CMD ["npm", "start"]
