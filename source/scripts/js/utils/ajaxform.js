'use-strict';

export default class AjaxForm {
    /**
     * Create new xhr post request object and return it
     * @param {string} url 
     */
    newPostRequest(url, nonce) {
        if (!url || !nonce) {
            console.error('AjaxForm: No url or nonce passed to the newPostRequest method!');
            return false;
        }

        const req = new XMLHttpRequest();
        req.open('POST', url, true);
        req.setRequestHeader('Content-Type', 'application/json');
        req.setRequestHeader('X-WP-NONCE', nonce);
        return req;
    }

    /**
     * Wrap xhr post request in a promise and return it
     * @param {object} req 
     * @param {object} data 
     */
    promisify(req, data) {
        if (!req) {
            console.error('AjaxForm: No request object passed to the promisify method!');
            return false;
        }

        return new Promise((resolve, reject) => {
            req.onload = () => {
                if (req.status >= 200 && req.status < 300) {
                    resolve(req.response);
                } else {
                    reject({
                        status: req.status,
                        statusText: req.statusText,
                        response: req.response
                    });
                }
            }

            req.onerror = () => {
                reject({
                    status: req.status,
                    statusText: req.statusText,
                    response: req.response
                });
            }

            req.send(JSON.stringify(data));
        });
    }

    /**
     * Create and send off a xhr post request
     * @param {object} config 
     */
    send({ url, data, nonce }) {
        if (!url) {
            console.error('AjaxForm: No url passed to the send method!');
            return false;
        }

        const req = this.newPostRequest(url, nonce);
        return this.promisify(req, data);
    }
}