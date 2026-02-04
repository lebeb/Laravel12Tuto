import { Config as ZiggyConfig } from 'ziggy-js';

declare global {
  interface Window {
    Ziggy: ZiggyConfig;
  }

  function route(): string;
  function route(name: string, params?: any, absolute?: boolean): string;
}

export {};
