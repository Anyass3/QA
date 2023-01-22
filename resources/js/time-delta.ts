
type timeDeltaOpts = { ago?: boolean; date: string | number | Date };

export function timeDelta(node: HTMLElement, { ago = true, date } = {} as timeDeltaOpts) {
    date = (date ?? node.dataset.timeDelta) ?? 0;
    const round = (t: number, dsc: string) => `${Math.floor(t)} ${dsc}${ago ? ' ago' : ''}`;
    const datetime = new Date(date);
    let timeoutId: NodeJS.Timeout;
    function setTimeDelta() {
        let nextInterval: number | null = null;
        const now = new Date();
        let seconds = ((now.getTime() - datetime.getTime()) * (ago ? 1 : -1)) / 1000; //in seconds
        let expired = false;
        if (seconds < 0) {
            if (!ago) {
                node.style.color = '#FF0000';
                expired = true;
            } else {
                node.style.color = '';
                return;
            }
        }
        seconds = Math.abs(seconds);

        const mins = seconds / 60;
        const hrs = mins / 60;
        const days = hrs / 24;
        const weeks = days / 7;
        let text = ago || expired ? 'just now' : 'few seconds';
        if (weeks >= 4) {
            text = `${datetime.getDate()}`;
            const months = weeks / 4;
            const years = months / 12;
            if (months < 13) {
                const isOne = Math.floor(months) == 1;
                text = round(months, 'month' + (isOne ? '' : 's'));
            } else {
                let dsc = 'year';
                if (years >= 2) {
                    dsc = 'years';
                }
                text = round(years, dsc);
            }
        } else if (weeks >= 2) {
            text = round(weeks, 'weeks');
        } else if (days >= 2) {
            text = round(days, 'days');
        } else if (hrs >= 2) {
            text = round(hrs, 'hours');
        } else if (mins >= 2) {
            text = round(mins, 'minutes');
        } else if (seconds >= 60) {
            text = round(mins, 'minute');
        } else if (seconds >= 5) {
            text = round(seconds, 'seconds');
        }
        if (expired) text = text + ' ago';
        node.textContent = text;
        if (text.includes('minute')) nextInterval = 1000 * 60;
        else if (text.match(/(second)|(now)/)) nextInterval = 5000;
        if (nextInterval) timeoutId = setTimeout(setTimeDelta, nextInterval);
    }
    setTimeDelta();
    return {
        destroy() {
            clearTimeout(timeoutId);
        }
    };
}
