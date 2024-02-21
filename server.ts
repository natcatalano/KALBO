import { Resend } from 'resend';

const resend = new Resend('re_WLMJJwhp_J4msocUXDGsLkG9e7G5QEMMk');

(async function () {
  const { data, error } = await resend.emails.send({
    from: 'Acme <onboarding@resend.dev>',
    to: ['brunopercara@gmail.com'],
    subject: 'Hello World',
    html: '<strong>It works!</strong>',
  });

  if (error) {
    return console.error({ error });
  }

  console.log({ data });
})();
