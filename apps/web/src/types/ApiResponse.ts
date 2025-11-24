export type ApiResponse<T> = {
    statusCode: number;
    success: boolean;
    requestId: string;
    timestamp: Date;
    data: T;
    error?: {
        message: string;
        details?: any;
    };
};
