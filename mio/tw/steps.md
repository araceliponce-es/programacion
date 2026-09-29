uname -m

x86_64 → most Intel/AMD PCs....

curl -L -o tailwindcss https://github.com/tailwindlabs/tailwindcss/releases/latest/download/tailwindcss-linux-x64

chmod +x tailwindcss

./tailwindcss --version

./tailwindcss -i ./input.css -o ./output.css --watch

(and remember to link the output css in the head of the html)
